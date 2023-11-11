<?php

namespace App\Modules\User\Controller;

use App\Core\ErrorHandler\JsonHandler;
use App\Core\JWT\JWTFactory;
use App\Core\Middlewares\AuthMiddleware;
use App\Modules\Auth\DTO\Request\LoginRequest;
use App\Modules\Auth\DTO\Request\ValidateRequest;
use App\Modules\Auth\Resource\TokenResource;
use App\Modules\Auth\Resource\ValidationResource;
use App\Modules\Auth\Service\AuthService;
use App\Modules\User\DTO\Request\UserCreationRequest;
use App\Modules\User\DTO\Request\UserDeleteRequest;
use App\Modules\User\DTO\Request\UserFindRequest;
use App\Modules\User\DTO\Request\UserUpdateRequest;
use App\Modules\User\Service\UserService;
use App\Modules\User\UserAPIFacade;
use Framework\Controller\Controller;
use Framework\Exception\HttpException;
use Framework\Request\Request;
use Framework\Response\JsonResource;
use Framework\Singleton\Router\HttpDefaultCodes;

class UserController extends Controller
{
    private UserService $userService;
    private AuthMiddleware $authMiddleware;

    public function __construct()
    {
        $this->errorHandler = new JsonHandler();
        $this->userService = new UserService();
        $this->authMiddleware = new AuthMiddleware();
    }

    public function findAll(Request $request)
    {
        $this->authMiddleware->handle($request);

        return $this->userService->findAll()->toArray();
    }

    public function find(Request $request)
    {
        $this->authMiddleware->handle($request);

        return $this->userService->find(UserFindRequest::fromRequest($request)->getId())->toArray();
    }

    public function create(Request $request)
    {        
        return $this->userService->create(UserCreationRequest::fromRequest($request))->toArray();
    }

    public function update(Request $request)
    {        
        $this->authMiddleware->handle($request);

        return $this->userService->update(UserUpdateRequest::fromRequest($request))->toArray();
    }

    public function delete(Request $request)
    {        
        $this->authMiddleware->handle($request);
        
        return $this->userService->delete(UserDeleteRequest::fromRequest($request)->getId())->toArray();
    }
}
