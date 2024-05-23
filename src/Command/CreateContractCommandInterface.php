<?php

namespace App\Command;

interface CreateContractCommandInterface
{
  public function execute(array $data): void;
}
