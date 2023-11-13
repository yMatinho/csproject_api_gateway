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
use App\Modules\User\Service\EmailVerificationService;
use App\Modules\User\Service\UserService;
use App\Modules\User\UserAPIFacade;
use Framework\Controller\Controller;
use Framework\Exception\HttpException;
use Framework\Request\Request;
use Framework\Response\JsonResource;
use Framework\Singleton\Router\HttpDefaultCodes;

class EmailVerificationController extends Controller
{
    private EmailVerificationService $emailVerificationService;

    public function __construct()
    {
        $this->errorHandler = new JsonHandler();
        $this->emailVerificationService = new EmailVerificationService();
    }

    public function sendEmailVerification(Request $request)
    {
        return $this->emailVerificationService->sendEmailVerification($request->email)->toArray();
    }

    public function verifyEmail(Request $request)
    {
        return $this->emailVerificationService->verifyEmail($request->token)->toArray();
    }
}
