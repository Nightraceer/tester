<?php

namespace App\Repository;

use App\Entity\Test;

interface TestRepository
{
    /**
     * @return list<Test>
     */
    public function getAll(): array;

    /**
     * @throws NotFoundException
     */
    public function get(string $id): Test;
}
