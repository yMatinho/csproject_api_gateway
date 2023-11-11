<?php

namespace App\Modules\User\DTO\Response;

use App\Modules\User\DTO\User;
use Framework\Request\Request;

class UserFindAllResponse
{

    public function __construct(
        private array $users
    ) {
    }

    public static function fromData(object $data): UserFindAllResponse
    {
        $convertedUsers = array_map(function ($rawUserData) {
            return User::fromData($rawUserData);
        }, $data->users);

        return new UserFindAllResponse(
            $convertedUsers
        );
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function toArray(): array
    {
        return [
            "users" => array_map(function (User $user) {
                return $user->toArray();
            }, $this->users)
        ];
    }
}
