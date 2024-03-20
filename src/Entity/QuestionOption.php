<?php

namespace App\Entity;

final class QuestionOption
{
    public function __construct(
        private string $id,
        private string $questionId,
        private string $name,
        private bool $isCorrect,
        private ?Question $question = null
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getQuestionId(): string
    {
        return $this->questionId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function isCorrect(): bool
    {
        return $this->isCorrect;
    }
}
