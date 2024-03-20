<?php

namespace App\Repository;


use RuntimeException;

final class NotFoundException extends RuntimeException
{
    public function __construct(string $entity, string $id)
    {
        parent::__construct(sprintf('Entity %s with id %s not found', $entity, $id));
    }
}
