<?php

namespace App\Command;


use App\Entity\Question;
use App\Entity\QuestionOption;
use App\Entity\Test;
use App\Entity\TestResult;
use App\Repository\QuestionRepository;
use App\Repository\TestRepository;
use App\Repository\TestResultRepository;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question as ConsoleQuestion;

#[AsCommand(name: 'test:run')]
final class RunTestCommand extends Command
{
    public function __construct(
        private readonly TestRepository $testRepository,
        private readonly TestResultRepository $testResultRepository,
        private readonly QuestionRepository $questionRepository
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $test = $this->chooseTest($input, $output);

        $testResult = $this->askQuestions($test, $input, $output);

        $output->writeln("\n\n<info>Your result: </info>");
        $this->renderTestResult($testResult->getCorrectAnswers(), 'Correct', $output);
        $this->renderTestResult($testResult->getIncorrectAnswers(), 'Incorrect', $output);

        return Command::SUCCESS;
    }

    private function chooseTest(InputInterface $input, OutputInterface $output): Test
    {
        $tests = $this->testRepository->getAll();
        $table = new Table($output);
        $table->setHeaders(['Key', 'Name']);
        foreach ($tests as $key => $test) {
            $table->addRow([$key, $test->getName()]);
        }
        $table->render();

        $questionHelper = $this->getHelper('question');
        $key = $questionHelper->ask($input, $output, new ConsoleQuestion('Choose test: '));
        if (!isset($tests[$key])) {
            $output->writeln('<error>Invalid test key</error>');
            return $this->chooseTest($input, $output);
        }

        return $this->testRepository->get($tests[$key]->getId());
    }

    private function askQuestions(Test $test, InputInterface $input, OutputInterface $output): TestResult
    {
        $testResult = new TestResult(Uuid::uuid4()->toString(), $test->getId());

        foreach ($test->getQuestions() as $question) {
            $chosenOptions = $this->askQuestion($question, $input, $output);
            $testResult->addAnswer($question, $chosenOptions);
        }

        $this->testResultRepository->create($testResult);

        return $testResult;
    }

    /**
     * @return list<QuestionOption>
     */
    private function askQuestion(Question $question, InputInterface $input, OutputInterface $output): array
    {
        $output->writeln("");
        $output->writeln($question->getQuestion());

        $table = new Table($output);
        $table->setHeaders(['Key', 'Option']);
        foreach ($question->getOptions() as $key => $option) {
            $table->addRow([$key, $option->getName()]);
        }
        $table->render();

        $questionHelper = $this->getHelper('question');
        $answer = $questionHelper->ask($input, $output, new ConsoleQuestion("Choose option/s (delimiter ','):"));
        $answers = array_map('trim', explode(',', $answer));
        $chosenOptions = [];
        foreach ($answers as $answer) {
            if (!isset($question->getOptions()[$answer])) {
                $output->writeln(sprintf('<error>Invalid option key "%s"</error>', $answer));
                return $this->askQuestion($question, $input, $output);
            }
            $chosenOptions[] = $question->getOptions()[$answer];
        }
        if (empty($chosenOptions)) {
            $output->writeln('<error>Please choose option/s</error>');
            return $this->askQuestion($question, $input, $output);
        }
        return $chosenOptions;
    }

    private function renderTestResult(array $answers, string $header, OutputInterface $output): void
    {
        $table = new Table($output);
        $table->setHeaders([sprintf('%s (%d)', $header, count($answers))]);
        foreach ($answers as $questionId => $optionIds) {
            $question = $this->questionRepository->get($questionId);
            $table->addRow([
                $question->getQuestion(),
                implode(
                    ', ',
                    array_map(
                        fn($option) => $option->getName(),
                        array_filter($question->getOptions(), fn($option) => in_array($option->getId(), $optionIds))
                    )
                )
            ]);
        }
        $table->render();
    }
}
