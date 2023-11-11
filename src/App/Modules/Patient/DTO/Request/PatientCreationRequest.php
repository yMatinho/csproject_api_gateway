<?php

namespace App\Modules\Patient\DTO\Request;

use App\Modules\Patient\DTO\Patient;
use Framework\Request\Request;

class PatientCreationRequest
{

    public function __construct(
        private string $name,
        private int $age,
        private int $height,
        private float $weight,
    ) {
    }

    public static function fromRequest(Request $data): PatientCreationRequest
    {
        return new PatientCreationRequest(
            $data->name,
            $data->age,
            $data->height,
            $data->weight
        );
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

    public function toRequest(): array {
        return [
            "name"=> $this->name,
            "age"=> $this->age,
            "height"=> $this->height,
            "weight"=> $this->weight
        ];
    }
}
