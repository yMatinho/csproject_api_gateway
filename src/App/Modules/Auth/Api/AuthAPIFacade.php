<?php

namespace App\Modules\Auth\Api;

use App\Modules\Auth\DTO\Request\LoginRequest;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use Framework\Http\HttpRequestFacade;
use Framework\Singleton\Router\HttpMethods;

class AuthAPIFacade
{
    private HttpRequestFacade $httpRequestFacade;
    public function __construct()
    {
        $this->httpRequestFacade = new HttpRequestFacade();
    }

    public function login(string $login, string $password): LoginResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::POST, USER_SERVICE_URL . "auth/login", [
            "login" => $login,
            "password" => $password
        ]);

        return LoginResponse::fromData($response);
    }

    public function validate(string $accessToken): ValidateResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::POST, USER_SERVICE_URL . "auth/validate", [
            "accessToken"=>$accessToken
        ]);

        return ValidateResponse::fromData($response);
    }
}
