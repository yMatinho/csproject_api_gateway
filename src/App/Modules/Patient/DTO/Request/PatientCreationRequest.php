<?php

namespace App\Modules\Patient\DTO\Request;

use Framework\Request\Request;

class PatientCreationRequest
{

    public function __construct(
        private Patient $patient
    ) {
    }

    public static function fromRequest(Request $data): PatientCreationRequest
    {
        return new PatientCreationRequest(
            Patient::fromRequest($data)
        );
    }

    public function getName(): string
    {
        return $this->patient->getName();
    }
    
    public function getAge(): int
    {
        return $this->patient->getAge();
    }

    public function getHeight(): int
    {
        return $this->patient->getHeight();
    }

    public function getWeight(): float
    {
        return $this->patient->getWeight();
    }
}
