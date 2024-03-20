<?php

namespace App\Repository;

use App\Entity\TestResult;

interface TestResultRepository
{
    public function create(TestResult $testResult): void;
}
