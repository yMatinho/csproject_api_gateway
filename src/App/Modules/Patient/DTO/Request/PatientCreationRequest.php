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
        self::validateRequest($data);

        return new PatientCreationRequest(
            $data->name,
            $data->age,
            $data->height,
            $data->weight
        );
    }

    public static function validateRequest(Request $request): void
    {
        if (empty($request->getValues()["name"]))
            throw new \Exception("Nome não pode ser vazio");
        if (empty($request->getValues()["age"]) || !is_numeric($request->getValues()["age"]))
            throw new \Exception("Idade não pode ser vazia");
        if (empty($request->getValues()["height"]) || !is_numeric($request->getValues()["height"]))
            throw new \Exception("Altura não pode ser vazia");
        if (empty($request->getValues()["weight"]) || !is_numeric($request->getValues()["weight"]))
            throw new \Exception("Peso não pode ser vazio");
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
