<?php

namespace App\Modules\Patient\DTO\Request;

use Framework\Request\Request;

class Patient
{

    public function __construct(
        private string $name,
        private int $age,
        private int $height,
        private float $weight,
        private ?int $id,
    ) {
    }

    public static function fromData(object $data) {
        return new Patient(
            $data->name,
            $data->age,
            $data->height,
            $data->weight,
            $data->id,
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
}
