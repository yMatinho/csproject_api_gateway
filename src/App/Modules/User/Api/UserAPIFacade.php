<?php

namespace App\Modules\User\Api;

use App\Modules\Auth\DTO\Request\LoginRequest;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use App\Modules\User\DTO\Request\UserCreationRequest;
use App\Modules\User\DTO\Request\UserUpdateRequest;
use App\Modules\User\DTO\Response\FindByCredentialsResponse;
use App\Modules\User\DTO\Response\SendEmailVerificationResponse;
use App\Modules\User\DTO\Response\UserCreationResponse;
use App\Modules\User\DTO\Response\UserDeleteResponse;
use App\Modules\User\DTO\Response\UserFindAllResponse;
use App\Modules\User\DTO\Response\UserFindResponse;
use App\Modules\User\DTO\Response\UserUpdateResponse;
use App\Modules\User\DTO\Response\VerifyEmailResponse;
use Framework\Http\HttpRequestFacade;
use Framework\Singleton\Router\HttpMethods;

class UserAPIFacade
{
    private HttpRequestFacade $httpRequestFacade;
    public function __construct()
    {
        $this->httpRequestFacade = new HttpRequestFacade();
    }

    public function sendEmailVerification(string $email): SendEmailVerificationResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::POST, USER_SERVICE_URL . "emailVerification/send", [
            "email"=>$email
        ]);

        return SendEmailVerificationResponse::fromData($response);
    }

    public function verifyEmail(string $token): VerifyEmailResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::PUT, USER_SERVICE_URL . "emailVerification/verify", [
            "token"=>$token
        ]);

        return VerifyEmailResponse::fromData($response);
    }

    public function findByCredentials(string $login, string $password): FindByCredentialsResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::POST, USER_SERVICE_URL . "user/findByCredentials", [
            "login" => $login,
            "password" => $password
        ]);

        return FindByCredentialsResponse::fromData($response);
    }

    public function create(UserCreationRequest $request): UserCreationResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::POST, USER_SERVICE_URL . "user", $request->toRequest());

        return UserCreationResponse::fromData($response);
    }

    public function update(UserUpdateRequest $request): UserUpdateResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::PUT, sprintf(
            "%s/user?id=%d",
            USER_SERVICE_URL,
            $request->getId()
        ), $request->toRequest());

        return UserUpdateResponse::fromData($response);
    }

    public function findAll(): UserFindAllResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::GET, USER_SERVICE_URL . "user/findAll");

        return UserFindAllResponse::fromData($response);
    }

    public function find(string $id): UserFindResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::GET, USER_SERVICE_URL . "user", [
            "id" => $id
        ]);

        return UserFindResponse::fromData($response);
    }

    public function delete(string $id): UserDeleteResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::DELETE, USER_SERVICE_URL . "user", [
            "id" => $id
        ]);

        return UserDeleteResponse::fromData($response);
    }
}
