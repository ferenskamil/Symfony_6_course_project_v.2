<?php

namespace App\Entity;

use App\Repository\AboutMeInfoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AboutMeInfoRepository::class)]
class AboutMeInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $key = null;

    #[ORM\Column(length: 1200)]
    private ?string $value = null;

    public function __construct(string $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
