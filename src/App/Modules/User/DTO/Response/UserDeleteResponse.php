<?php

namespace App\Modules\User\DTO\Response;

use App\Modules\User\DTO\User;
use Framework\Request\Request;

class UserDeleteResponse
{

    public function __construct(
        private string $message
    ) {
    }

    public static function fromData(object $data): UserDeleteResponse
    {
        return new UserDeleteResponse(
            $data->message
        );
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function toArray(): array {
        return [
            "message"=>$this->getMessage()
        ];
    }
}
