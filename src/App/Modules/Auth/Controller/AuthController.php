<?php

namespace App\Modules\Auth\Controller;

use App\Core\ErrorHandler\JsonHandler;
use App\Core\JWT\JWTFactory;
use App\Modules\Auth\DTO\Request\LoginRequest;
use App\Modules\Auth\DTO\Request\ValidateRequest;
use App\Modules\Auth\Resource\TokenResource;
use App\Modules\Auth\Resource\ValidationResource;
use App\Modules\Auth\Service\AuthService;
use App\Modules\User\UserAPIFacade;
use Framework\Controller\Controller;
use Framework\Exception\HttpException;
use Framework\Request\Request;
use Framework\Response\JsonResource;
use Framework\Singleton\Router\HttpDefaultCodes;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct()
    {
        $this->errorHandler = new JsonHandler();
        $this->authService = new AuthService();
    }

    public function login(Request $request)
    {
        $dto = LoginRequest::fromRequest($request);
        
        return $this->authService->login($dto->getLogin(), $dto->getPassword())->toArray();
    }

    public function validate(Request $request)
    {
        $dto = ValidateRequest::fromRequest($request);
        
        return $this->authService->validate($dto->getAccessToken())->toArray();
    }
}
