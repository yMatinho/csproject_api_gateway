<?php

namespace App\Modules\User\DTO\Response;

use App\Modules\User\DTO\User;
use Framework\Request\Request;

class UserUpdateResponse
{

    public function __construct(
        private User $user
    ) {
    }

    public static function fromData(object $data): UserUpdateResponse
    {
        return new UserUpdateResponse(
            User::fromData($data->user)
        );
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getId(): int {
        return $this->user->getId();
    }

    public function getFirstName(): string {
        return $this->user->getFirstName();
    }

    public function getLastName(): string {
        return $this->user->getLastName();
    }

    public function getEmail(): string {
        return $this->user->getEmail();
    }

    public function getUsername(): string {
        return $this->user->getUsername();
    }

    public function getCreatedAt(): string {
        return $this->user->getCreatedAt();
    }

    public function getUpdatedAt(): ?string {
        return $this->user->getUpdatedAt();
    }


    public function toArray(): array {
        return [
            "id"=>$this->getId(),
            "firstName"=>$this->getFirstName(),
            "lastName"=>$this->getLastName(),
            "email"=>$this->getEmail(),
            "username"=>$this->getUsername(),
            "createdAt"=>$this->getCreatedAt(),
            "updatedAt"=>$this->getUpdatedAt()
        ];
    }
}
