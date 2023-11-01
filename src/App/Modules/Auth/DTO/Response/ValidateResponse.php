<?php

namespace App\Modules\Auth\DTO\Response;

use App\Core\DTO\Response\HttpDefaultResponse;

class ValidateResponse
{

    public function __construct(
        private int $statusCode,
        private string $message,
    ) {
    }

    public static function fromData(object $data): ValidateResponse
    {
        return new ValidateResponse(
            $data->statusCode,
            $data->message,
        );
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
            "message"=>$this->getMessage()
        ];
    }
}
