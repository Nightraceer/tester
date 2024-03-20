<?php

namespace App\Repository;


use App\Entity\TestResult;
use Doctrine\ORM\EntityManagerInterface;

final readonly class DoctrineTestResultRepository implements TestResultRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function create(TestResult $testResult): void
    {
        $this->entityManager->persist($testResult);
        $this->entityManager->flush();
    }
}
