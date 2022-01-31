<?php

namespace App\Entity;
class Annonce
{

    public int $prix;
    public String $titre;
    public String $imageUrl;
    public String $publicationDate;
    public String $description;
    public String $etiquette;
    public array $commentThreads;

    public function getAnnonceId(): int
    {
        return $this->annonceId;
    }

    public function setAnnonceId(int $annonceId): void
    {
        $this->annonceId = $annonceId;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getPublicationDate(): string
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(string $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getEtiquette(): string
    {
        return $this->etiquette;
    }

    public function setEtiquette(string $etiquette): void
    {
        $this->etiquette = $etiquette;
    }

    public function getCommentThreads(): array
    {
        return $this->commentThreads;
    }

    public function setCommentThreads(array $commentThreads): void
    {
        $this->commentThreads = $commentThreads;
    }
}