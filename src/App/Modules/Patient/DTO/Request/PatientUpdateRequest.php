<?php

namespace App\Modules\Patient\DTO\Request;

use App\Modules\Patient\DTO\Patient;
use Framework\Request\Request;

class PatientUpdateRequest
{

    public function __construct(
        private int $id,
        private ?string $name,
        private ?int $age,
        private ?int $height,
        private ?float $weight,
    ) {
    }

    public static function fromRequest(Request $data): PatientUpdateRequest
    {
        return new PatientUpdateRequest(
            $data->id,
            $data->name,
            $data->age,
            $data->height,
            $data->weight
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function toRequest(): array {
        return array_filter([
            "name"=> $this->name,
            "age"=> $this->age,
            "height"=> $this->height,
            "weight"=> $this->weight
        ], function($bodyItem) {
            return $bodyItem !== null;
        });
    }
}
