<?php

namespace App\Entity;

final class Test
{
    /** @var list<Question> */
    private array $questions = [];

    public function __construct(
        private readonly string $id,
        private readonly string $name
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setQuestions(array $questions): void
    {
        $this->questions = $questions;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }
}
