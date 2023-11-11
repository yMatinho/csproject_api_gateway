<?php

namespace App\Modules\Patient\DTO;

use Framework\Request\Request;

class Patient
{

    public function __construct(
        private ?int $id,
        private string $name,
        private int $age,
        private int $height,
        private float $weight,
        private ?string $createdAt=null,
        private ?string $updatedAt=null,
    ) {
    }

    public static function fromData(object $data) {
        return new Patient(
            $data->id,
            $data->name,
            $data->age,
            $data->height,
            $data->weight,
            $data->createdAt,
            $data->updatedAt,
        );
    }

    public static function fromRequest(Request $data): Patient
    {
        return self::fromData($data);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }

    public function toArray(): array {
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "age"=> $this->age,
            "height"=> $this->height,
            "weight"=> $this->weight,
            "createdAt"=>$this->createdAt,
            "updatedAt"=>$this->updatedAt
        ];
    }
}
