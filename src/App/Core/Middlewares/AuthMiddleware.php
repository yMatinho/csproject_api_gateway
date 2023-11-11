<?php

namespace App\Core\Middlewares;

use App\Modules\Auth\Service\AuthService;
use Framework\Exception\HttpException;
use Framework\Request\Request;
use Framework\Singleton\Router\HttpDefaultCodes;

class AuthMiddleware
{

    private AuthService $authService;
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function handle(Request $request)
    {
        if (!$request->hasHeader("Authorization"))
            throw new HttpException("Unauthorized", HttpDefaultCodes::UNAUTHORIZED);

        $accessToken = str_replace("Bearer ", "", $request->header("Authorization"));
        $response = $this->authService->validate($accessToken);
        if ($response->getStatusCode() != 200)
            throw new HttpException("Unauthorized", HttpDefaultCodes::UNAUTHORIZED);
    }
}
