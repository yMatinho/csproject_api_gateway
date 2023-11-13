<?php

namespace App\Modules\User\DTO\Request;

use App\Modules\User\DTO\User;
use Framework\Request\Request;

class UserCreationRequest
{

    public function __construct(
        private string $username,
        private string $password,
        private string $email,
        private string $firstName,
        private string $lastName,
    ) {
    }

    public static function fromRequest(Request $data): UserCreationRequest
    {
        self::validateRequest($data);

        return new UserCreationRequest(
            $data->username,
            $data->password,
            $data->email,
            $data->firstName,
            $data->lastName
        );
    }

    public static function validateRequest(Request $request): void
    {
        if (empty($request->getValues()["username"]))
            throw new \Exception("Usuário não pode ser vazio");
        if (empty($request->getValues()["password"]))
            throw new \Exception("Senha não pode ser vazia");
        if (empty($request->getValues()["email"]))
            throw new \Exception("Email não pode ser vazio");
        if (empty($request->getValues()["firstName"]))
            throw new \Exception("Nome não pode ser vazio");
        if (empty($request->getValues()["lastName"]))
            throw new \Exception("Sobrenome não pode ser vazio");
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function toRequest(): array
    {
        return [
            "password" => $this->password,
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "username" => $this->username,
            "email" => $this->email
        ];
    }
}
