<?php

namespace App\Entity;

use App\Repository\PowerContractRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PowerContractRepository::class)]
class PowerContract extends Contract
{
  #[ORM\Column(length: 255)]
  private ?string $meterNumber = null;

  #[ORM\Column(length: 255)]
  private ?string $energySource = null;

  public function getMeterNumber(): ?string
  {
    return $this->meterNumber;
  }

  public function setMeterNumber(string $meterNumber): static
  {
    $this->meterNumber = $meterNumber;

    return $this;
  }

  public function getEnergySource(): ?string
  {
    return $this->energySource;
  }

  public function setEnergySource(string $energySource): static
  {
    $this->energySource = $energySource;

    return $this;
  }
}
