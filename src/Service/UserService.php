<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\Request\CreateUserRequest;
use App\DTO\Response\IdResponse;
use App\DTO\Response\UserInfoResponse;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserService implements UserServiceInterface
{
    private const BALANCE_TOP_UP_LIMIT = 100;

    public function __construct(
        private EntityManagerInterface $em,
        private UserRepository $userRepository,
    )
    {
    }

    public function getUserInfoById(int $id): UserInfoResponse
    {
        $user = $this->userRepository->getById($id);

        $phoneNumbers = [];
        foreach ($user->getPhoneNumbers() as $phoneNumber) {
            $phoneNumbers[] = $phoneNumber->getFullNumber();
        }

        return new UserInfoResponse(
            $user->getName(),
            $user->getBirthDate(),
            $phoneNumbers
        );
    }

    public function createUser(CreateUserRequest $request): IdResponse
    {
        $user = new User();
        $user->setName($request->getName())
            ->setBirthDate($request->getBirthdate());

        $this->em->persist($user);
        $this->em->flush();

        return new IdResponse($user->getId());
    }

    public function deleteUser(int $id): void
    {
        $user = $this->userRepository->getById($id);

        $this->em->remove($user);
        $this->em->flush();
    }

}
