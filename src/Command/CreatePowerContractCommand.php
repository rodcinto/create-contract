<?php

namespace App\Command;

use App\Entity\PowerContract;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class CreatePowerContractCommand implements CreateContractCommandInterface
{
  public function __construct(private EntityManagerInterface $entityManager)
  {
  }
  public function execute(array $data): void
  {
    $contract = new PowerContract();
    // Any number crafting logic.
    $contract->setContractNumber('P123.222.33.44');
    $contract->setCustomerId(1);


    $startDate = new DateTime();
    $startDate->modify('first day of next month');
    $contract->setStartDate($startDate);

    $endDate = $startDate->modify('+1 year');
    $contract->setEndDate($endDate);

    // Specifics for Power Contracts:
    $contract->setMeterNumber('1234567890');
    $contract->setEnergySource('Renewable');

    $this->entityManager->persist($contract);

    $this->entityManager->flush();
  }
}
