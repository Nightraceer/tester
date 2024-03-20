<?php

namespace App\Entity;

final class Question
{
    /**
     * @var list<QuestionOption>
     */
    private array $options = [];

    public function __construct(
        private readonly string $id,
        private readonly string $testId,
        private readonly string $question,
        private readonly ?Test $test = null
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

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
