<?php

namespace App\Entity;

final class TestResult
{
    public function __construct(
        private string $id,
        private string $testId,
        private array $correctAnswers = [],
        private array $incorrectAnswers = []
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTestId(): string
    {
        return $this->testId;
    }

    public function getCorrectAnswers(): array
    {
        return $this->correctAnswers;
    }

    public function getIncorrectAnswers(): array
    {
        return $this->incorrectAnswers;
    }

    /**
     * @param list<QuestionOption> $options
     */
    public function addAnswer(Question $question, array $options): void
    {
        $hasIncorrect = count(array_filter($options, fn(QuestionOption $option) => !$option->isCorrect())) > 0;
        $optionsIds = array_map(fn(QuestionOption $option) => $option->getId(), $options);
        if ($hasIncorrect) {
            $this->incorrectAnswers[$question->getId()] = $optionsIds;
            return;
        }

        $this->correctAnswers[$question->getId()] = $optionsIds;
    }
}
