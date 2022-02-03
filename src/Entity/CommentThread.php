<?php

namespace App\Entity;

use App\Repository\CommentThreadRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentThreadRepository::class)]
class CommentThread
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text', nullable: true)]
    private $comment;

    #[ORM\Column(type: 'array', nullable: true)]
    private $answers = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAnswers(): ?array
    {
        return $this->answers;
    }

    public function setAnswers(?array $answers): self
    {
        $this->answers = $answers;

        return $this;
    }
}
