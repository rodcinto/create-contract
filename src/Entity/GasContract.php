<?php

namespace App\Entity;

use App\Repository\GasContractRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GasContractRepository::class)]
class GasContract extends Contract
{
  #[ORM\Column(length: 255)]
  private ?string $purpose = null;

  #[ORM\Column(length: 255)]
  private ?string $consumeType = null;

  public function getPurpose(): ?string
  {
    return $this->purpose;
  }

  public function setPurpose(string $purpose): static
  {
    $this->purpose = $purpose;

    return $this;
  }

  public function getConsumeType(): ?string
  {
    return $this->consumeType;
  }

  public function setConsumeType(string $consumeType): static
  {
    $this->consumeType = $consumeType;

    return $this;
  }
}
