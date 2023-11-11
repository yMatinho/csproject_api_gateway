<?php

namespace App\Modules\User\DTO\Request;

use App\Modules\User\DTO\User;
use Framework\Request\Request;

class UserFindRequest
{

    public function __construct(
        private int $id
    ) {
    }

    public static function fromRequest(Request $data): UserFindRequest
    {
        return new UserFindRequest(
            $data->id
        );
    }

    public function getId(): int {
        return $this->id;
    }
}
