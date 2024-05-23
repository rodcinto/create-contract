<?php

namespace App\Service;

use App\Command\CreateContractCommandInterface;
use App\Command\CreateGasContractCommand;
use App\Command\CreatePowerContractCommand;
use App\Command\CreateWaterContractCommand;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class ContractServiceSubscriber implements ServiceSubscriberInterface
{
  public function __construct(
    private ContainerInterface $locator,
  ) {
  }

  /**
   * @throws NotFoundExceptionInterface
   */
  public function createContract(string $commandId): void
  {
    if (!$this->locator->has($commandId)) {
      throw new CommandNotFoundException(
      sprintf(
        'Command `%s` not found. Commands available are `%s`.',
        $commandId,
        implode(' / ', array_keys(self::getSubscribedServices()))
      ));
    }

    /** @var CreateContractCommandInterface */
    $handler = $this->locator->get($commandId);

    $handler->execute([]);
  }

  public static function getSubscribedServices(): array
  {
    return [
      'power' => CreatePowerContractCommand::class,
      'water' => CreateWaterContractCommand::class,
      'gas' => CreateGasContractCommand::class,
    ];
  }
}
