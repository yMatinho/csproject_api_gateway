<?php

namespace App\Modules\User\DTO\Response;

use App\Modules\User\DTO\User;

class SendEmailVerificationResponse
{
    public function __construct(
        private bool $status,
        private string $message
    ) {
    }

    public static function fromData(object $data): SendEmailVerificationResponse
    {
        return new SendEmailVerificationResponse($data->status, $data->message);
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function toArray(): array {
        return [
            "message"=>$this->message
        ];
    }
}
