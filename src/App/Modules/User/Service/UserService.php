<?php

namespace App\Modules\User\Service;

use App\Core\JWT\JWT;
use App\Core\JWT\JWTFactory;
use App\Core\JWT\JWTValidationStrategy;
use App\Modules\Auth\Api\AuthAPIFacade;
use App\Modules\User\Api\UserAPIFacade;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use App\Modules\User\DTO\Request\UserCreationRequest;
use App\Modules\User\DTO\Request\UserUpdateRequest;
use App\Modules\User\DTO\Response\FindByCredentialsResponse;
use App\Modules\User\DTO\Response\UserCreationResponse;
use App\Modules\User\DTO\Response\UserDeleteResponse;
use App\Modules\User\DTO\Response\UserFindAllResponse;
use App\Modules\User\DTO\Response\UserFindResponse;
use App\Modules\User\DTO\Response\UserUpdateResponse;
use Framework\Exception\HttpException;
use Framework\Singleton\Router\HttpDefaultCodes;

class UserService
{
    private UserAPIFacade $userAPIFacade;
    public function __construct()
    {
        $this->userAPIFacade = new UserAPIFacade();
    }

    public function create(UserCreationRequest $request): UserCreationResponse
    {
        return $this->userAPIFacade->create($request);
    }

    public function findAll(): UserFindAllResponse
    {
        return $this->userAPIFacade->findAll();
    }

    public function find(string $id): UserFindResponse
    {
        return $this->userAPIFacade->find($id);
    }

    public function findByCredentials(string $username, string $password): FindByCredentialsResponse {
        return $this->userAPIFacade->findByCredentials($username, $password);
    }

    public function update(UserUpdateRequest $request): UserUpdateResponse
    {
        return $this->userAPIFacade->update($request);
    }

    public function delete(string $id): UserDeleteResponse
    {
        return $this->userAPIFacade->delete($id);
    }
}
