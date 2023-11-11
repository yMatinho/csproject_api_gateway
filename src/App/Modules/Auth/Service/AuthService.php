<?php

namespace App\Modules\Auth\Service;

use App\Core\JWT\JWT;
use App\Core\JWT\JWTFactory;
use App\Core\JWT\JWTValidationStrategy;
use App\Modules\Auth\Api\AuthAPIFacade;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use App\Modules\User\UserAPIFacade;
use Framework\Exception\HttpException;
use Framework\Singleton\Router\HttpDefaultCodes;

class AuthService
{
    private AuthAPIFacade $authAPIFacade;
    public function __construct()
    {
        $this->authAPIFacade = new AuthAPIFacade();
    }

    public function login(string $login, string $password): LoginResponse
    {
        return $this->authAPIFacade->login($login, $password);
    }

    public function validate(string $accessToken): ValidateResponse
    {
        $response = $this->authAPIFacade->validate($accessToken);

        if ($response->getStatusCode() == HttpDefaultCodes::UNAUTHORIZED)
            throw new HttpException($response->getMessage(), HttpDefaultCodes::UNAUTHORIZED);

        return $response;
    }
}
