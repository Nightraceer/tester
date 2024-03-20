<?php

namespace App\Repository;

use App\Entity\Question;

interface QuestionRepository
{
    /**
     * @return list<Question>
     */
    public function getAllOfTest(string $testId): array;

    public function get(string $id): Question;
}
