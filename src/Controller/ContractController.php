<?php

namespace App\Controller;

use App\Service\ContractServiceSubscriber;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ContractController extends AbstractController
{
  public function __construct(
    private ContractServiceSubscriber $contractSubscriber
  ) {
  }

  #[Route('/contract', methods: [Request::METHOD_POST], name: 'app_contract_create')]
  public function create(Request $request): JsonResponse
  {
    $type = $request->get('type');

    try {
      $this->contractSubscriber->createContract($type);
    } catch (\Throwable $th) {
      return new JsonResponse(['error' => $th->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
    }

    return new JsonResponse(['status' => 'Contract created'], JsonResponse::HTTP_CREATED);
  }
}
