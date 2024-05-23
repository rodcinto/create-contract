<?php

namespace App\Command;

use App\Entity\GasContract;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class CreateGasContractCommand implements CreateContractCommandInterface
{
  public function __construct(private EntityManagerInterface $entityManager)
  {
  }

  public function execute(array $data): void
  {
    $contract = new GasContract();

    // Any number crafting logic.
    $contract->setContractNumber('G333.s22.33.PP');
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

    // Specifics for Gas Contracts:
    $contract->setPurpose('heating');
    $contract->setConsumeType('residential');


    $this->entityManager->persist($contract);

    $this->entityManager->flush();
  }
}
