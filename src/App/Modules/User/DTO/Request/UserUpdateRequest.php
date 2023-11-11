<?php

namespace App\Modules\User\DTO\Request;

use App\Modules\User\DTO\User;
use Framework\Request\Request;

class UserUpdateRequest
{

    public function __construct(
        private int $id,
        private ?string $username,
        private ?string $password,
        private ?string $email,
        private ?string $firstName,
        private ?string $lastName,
    ) {
    }

    public static function fromRequest(Request $data): UserUpdateRequest
    {
        return new UserUpdateRequest(
            $data->id,
            $data->username,
            $data->password,
            $data->email,
            $data->firstName,
            $data->lastName
        );
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function toRequest(): array {
        return array_filter([
            "password"=> $this->password,
            "firstName"=> $this->firstName,
            "lastName"=> $this->lastName,
            "username"=> $this->username,
            "email"=> $this->email
        ], function($bodyItem) {
            return $bodyItem !== null;
        });
    }
}
