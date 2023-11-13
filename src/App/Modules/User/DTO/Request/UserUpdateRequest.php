<?php

namespace App\Modules\User\DTO\Request;

use App\Modules\User\DTO\User;
use Framework\Request\Request;

class UserUpdateRequest
{

    public function __construct(
        private int $id,
        private ?string $password,
        private ?string $firstName,
        private ?string $lastName,
    ) {
    }

    public static function fromRequest(Request $data): UserUpdateRequest
    {
        self::validateRequest($data);

        return new UserUpdateRequest(
            $data->id,
            $data->password,
            $data->firstName,
            $data->lastName
        );
    }

    public static function validateRequest(Request $request): void
    {
        if (empty($request->getValues()["id"]))
            throw new \Exception("ID não pode ser vazio");
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function toRequest(): array
    {
        return array_filter([
            "password" => $this->password,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
        ], function ($bodyItem) {
            return $bodyItem !== null;
        });
    }
}
