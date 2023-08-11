<?php

namespace App\Service;

use App\DTO\Request\CreateUserRequest;
use App\DTO\Response\IdResponse;
use App\DTO\Response\UserInfoResponse;

interface UserServiceInterface
{
    public function getUserInfoById(int $id): UserInfoResponse;
    public function createUser(CreateUserRequest $request): IdResponse;
    public function deleteUser(int $id): void;
}
