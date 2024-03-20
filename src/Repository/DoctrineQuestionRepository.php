<?php

namespace App\Repository;


use App\Entity\Question;
use App\Entity\QuestionOption;
use Doctrine\ORM\EntityManagerInterface;

final readonly class DoctrineQuestionRepository implements QuestionRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function getAllOfTest(string $testId): array
    {
        $questions = $this->entityManager
            ->getRepository(Question::class)
            ->findBy(['testId' => $testId]);

        $ids = array_map(fn(Question $question) => $question->getId(), $questions);

        $options = $this->entityManager
            ->getRepository(QuestionOption::class)
            ->findBy(['questionId' => $ids]);

        foreach ($questions as $question) {
            $question->setOptions(
                array_values(
                    array_filter($options, fn(QuestionOption $option) => $option->getQuestionId() === $question->getId())
                )
            );
        }

        return $questions;
    }

    public function get(string $id): Question
    {
        $test = $this->entityManager
            ->getRepository(Question::class)
            ->findOneBy(['id' => $id]);
        if (!$test) {
            throw new NotFoundException('question', $id);
        }

        return $test;
    }
}
