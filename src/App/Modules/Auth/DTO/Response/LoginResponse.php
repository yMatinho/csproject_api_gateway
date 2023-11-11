<?php

namespace App\Modules\Auth\DTO\Response;

use App\Core\DTO\Response\HttpDefaultResponse;

class LoginResponse
{

    public function __construct(
        private int $statusCode,
        private string $accessToken,
    ) {
    }

    public static function fromData(object $data): LoginResponse
    {
        return new LoginResponse(
            $data->statusCode,
            $data->accessToken,
        );
    }


    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function toArray(): array
    {
        return [
            "accessToken" => $this->getAccessToken()
        ];
    }
}
