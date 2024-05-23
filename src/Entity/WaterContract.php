<?php

namespace App\Entity;

use App\Repository\WaterContractRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WaterContractRepository::class)]
class WaterContract extends Contract
{
  #[ORM\Column(length: 255)]
  private ?string $waterSource = null;

  #[ORM\Column(length: 255)]
  private ?string $waterQuality = null;

  #[ORM\Column]
  private ?bool $hasBackflowPrevention = null;

  public function getWaterSource(): ?string
  {
    return $this->waterSource;
  }

  public function setWaterSource(string $waterSource): static
  {
    $this->waterSource = $waterSource;

    return $this;
  }

  public function getWaterQuality(): ?string
  {
    return $this->waterQuality;
  }

  public function setWaterQuality(string $waterQuality): static
  {
    $this->waterQuality = $waterQuality;

    return $this;
  }

  public function hasBackflowPrevention(): ?bool
  {
    return $this->hasBackflowPrevention;
  }

  public function setHasBackflowPrevention(bool $hasBackflowPrevention): static
  {
    $this->hasBackflowPrevention = $hasBackflowPrevention;

    return $this;
  }
}
