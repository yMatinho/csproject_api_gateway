<?php

namespace App\Modules\Auth\Service;

use App\Core\JWT\JWT;
use App\Core\JWT\JWTFactory;
use App\Core\JWT\JWTValidationStrategy;
use App\Core\Redis\RedisFacade;
use App\Modules\Auth\Api\AuthAPIFacade;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use App\Modules\User\UserAPIFacade;
use Framework\Exception\HttpException;
use Framework\Singleton\Router\HttpDefaultCodes;
use Predis\Client;

class AuthService
{
    private AuthAPIFacade $authAPIFacade;
    private RedisFacade $redisFacade;
    public function __construct()
    {
        $this->authAPIFacade = new AuthAPIFacade();
        $this->redisFacade = new RedisFacade();
    }

    public function login(string $login, string $password): LoginResponse
    {
        $response = $this->authAPIFacade->login($login, $password);

        return $response;
    }

    public function validate(string $accessToken): ValidateResponse
    {
        $cachedToken = $this->getCachedToken($accessToken);
        if ($cachedToken)
            return $cachedToken;

        $response = $this->authAPIFacade->validate($accessToken);
        if ($response->getStatusCode() == HttpDefaultCodes::UNAUTHORIZED)
            throw new HttpException($response->getMessage(), HttpDefaultCodes::UNAUTHORIZED);

        $this->redisFacade->set($accessToken, serialize(["expiresIn" => date("Y-m-d H:i:s", time() + 60 * 60 * 24)]));

        return $response;
    }

    private function getCachedToken(string $accessToken): ?ValidateResponse
    {
        $cachedToken = unserialize($this->redisFacade->get($accessToken) ?: "");
        if (!empty($cachedToken) && strtotime($cachedToken["expiresIn"]) > time()) {
            return new ValidateResponse(HttpDefaultCodes::SUCCESS, "Authorized");
        } else {
            $this->redisFacade->delete($accessToken);
        }

        return null;
    }
}
