<?php

namespace App\Repository;


use App\Entity\Test;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\Uuid;

final readonly class DoctrineTestRepository implements TestRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private QuestionRepository $questionRepository
    ) {
    }

    public function getAll(): array
    {
        return $this->entityManager
            ->getRepository(Test::class)
            ->findAll();
    }

    public function get(string $id): Test
    {
        $test = $this->entityManager
            ->getRepository(Test::class)
            ->findOneBy(['id' => $id]);
        if (!$test) {
            throw new NotFoundException('test', $id);
        }

        $questions = $this->questionRepository->getAllOfTest($id);
        $test->setQuestions($questions);

        return $test;
    }

    public function create(): void
    {
        $test = new Test(Uuid::uuid4()->toString(), 'test');
        $this->entityManager->persist($test);
        $this->entityManager->flush();
    }
}
