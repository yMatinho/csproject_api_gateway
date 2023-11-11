<?php

namespace App\Modules\User\DTO\Request;

use App\Modules\User\DTO\User;
use Framework\Request\Request;

class UserDeleteRequest
{

    public function __construct(
        private int $id
    ) {
    }

    public static function fromRequest(Request $data): UserDeleteRequest
    {
        return new UserDeleteRequest(
            $data->id
        );
    }

    public function getId(): int {
        return $this->id;
    }
}
