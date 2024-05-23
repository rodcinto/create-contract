<?php

namespace App\Command;

use App\Entity\WaterContract;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class CreateWaterContractCommand implements CreateContractCommandInterface
{
  public function __construct(private EntityManagerInterface $entityManager)
  {
  }

  public function execute(array $data): void
  {
    $contract = new WaterContract();

    // Any number crafting logic.
    $contract->setContractNumber('W4T3R.222.33.44');
    $contract->setCustomerId(1);


    $startDate = new DateTime();
    $startDate->modify('first day of next month');
    $contract->setStartDate($startDate);

    $endDate = $startDate->modify('+1 year');
    $contract->setEndDate($endDate);

    // And this is the cool part. Even if you wanted to uncomment the lines bellow
    // and persist fields that could belong to the very same table,
    // but wouldn't make sense for the domain logic, it won't let you.
    // $contract->setMeterNumber('1234567890');
    // $contract->setEnergySource('Renewable');

    // Specifics for Water Contracts:
    $contract->setWaterQuality('drinkable');
    $contract->setWaterSource('municipal');
    $contract->setHasBackflowPrevention(true);

    $this->entityManager->persist($contract);

    $this->entityManager->flush();
  }
}
