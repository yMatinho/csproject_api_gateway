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
use App\Modules\User\DTO\Response\SendEmailVerificationResponse;
use App\Modules\User\DTO\Response\UserCreationResponse;
use App\Modules\User\DTO\Response\UserDeleteResponse;
use App\Modules\User\DTO\Response\UserFindAllResponse;
use App\Modules\User\DTO\Response\UserFindResponse;
use App\Modules\User\DTO\Response\UserUpdateResponse;
use App\Modules\User\DTO\Response\VerifyEmailResponse;
use Framework\Exception\HttpException;
use Framework\Singleton\Router\HttpDefaultCodes;

class EmailVerificationService
{
    private UserAPIFacade $userAPIFacade;
    public function __construct()
    {
        $this->userAPIFacade = new UserAPIFacade();
    }
    public function sendEmailVerification(string $email): SendEmailVerificationResponse
    {
        return $this->userAPIFacade->sendEmailVerification($email);
    }

    public function verifyEmail(string $token): VerifyEmailResponse {
        return $this->userAPIFacade->verifyEmail($token);
    }
}
