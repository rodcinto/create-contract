<?php

namespace App\Entity;

use App\Repository\ContractRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[MappedSuperclass]
#[InheritanceType('SINGLE_TABLE')]
#[ORM\Entity(repositoryClass: ContractRepository::class)]
class Contract
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column]
  private ?int $customerId = null;

  #[ORM\Column(length: 36)]
  private ?string $contractNumber = null;

  #[ORM\Column(type: Types::DATE_MUTABLE)]
  private ?\DateTimeInterface $startDate = null;

  #[ORM\Column(type: Types::DATE_MUTABLE)]
  private ?\DateTimeInterface $endDate = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getCustomerId(): ?int
  {
    return $this->customerId;
  }

  public function setCustomerId(int $customerId): static
  {
    $this->customerId = $customerId;

    return $this;
  }

  public function getContractNumber(): ?string
  {
    return $this->contractNumber;
  }

  public function setContractNumber(string $contractNumber): static
  {
    $this->contractNumber = $contractNumber;

    return $this;
  }

  public function getStartDate(): ?\DateTimeInterface
  {
    return $this->startDate;
  }

  public function setStartDate(\DateTimeInterface $startDate): static
  {
    $this->startDate = $startDate;

    return $this;
  }

  public function getEndDate(): ?\DateTimeInterface
  {
    return $this->endDate;
  }

  public function setEndDate(\DateTimeInterface $endDate): static
  {
    $this->endDate = $endDate;

    return $this;
  }
}
