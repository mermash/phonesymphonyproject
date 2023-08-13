<?php

namespace App\Controller;

use App\DTO\Request\AddPhoneNumberRequest;
use App\DTO\Request\CreateUserRequest;
use App\DTO\Request\PhoneBalanceTopUpRequest;
use App\Service\PhoneServiceInterface;
use App\Service\UserServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Attribute\RequestBody;

class UserController extends AbstractController
{
    public function __construct(
        private UserServiceInterface $userService,
        private PhoneServiceInterface $phoneService
    )
    {
    }

    #[Route('/api/v1/user/{id}', methods: ['GET'])]
    public function getUserInfo(int $id): Response
    {
        return $this->json($this->userService->getUserInfoById($id));
    }

    #[Route('/api/v1/user', methods: ['POST'])]
    public function createUser(#[RequestBody] CreateUserRequest $request): Response
    {
        return $this->json($this->userService->createUser($request));
    }

    #[Route('/api/v1/user/{id}', methods: ['DELETE'])]
    public function deleteUser(int $id): Response
    {
        $this->userService->deleteUser($id);
        return $this->json(null);
    }

    #[Route('/api/v1/user/phone/topup', methods: ['PUT'])]
    public function phoneBalanceTopUp(#[RequestBody] PhoneBalanceTopUpRequest $request): Response
    {
        $this->phoneService->phoneBalanceTopUp($request);
        return $this->json(null);
    }

    #[Route('/api/v1/user/phone/add', methods: ['PUT'])]
    public function addPhone(#[RequestBody] AddPhoneNumberRequest $request): Response
    {
        $this->phoneService->addPhoneNumber($request);
        return $this->json(null);
    }
}
