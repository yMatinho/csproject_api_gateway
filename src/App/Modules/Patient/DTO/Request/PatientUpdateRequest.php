<?php

namespace App\Modules\Patient\DTO\Request;

use App\Modules\Patient\DTO\Patient;
use Framework\Request\Request;

class PatientUpdateRequest
{

    public function __construct(
        private Patient $patient
    ) {
    }

    public static function fromRequest(Request $data): PatientUpdateRequest
    {
        return new PatientUpdateRequest(
            Patient::fromRequest($data)
        );
    }

    public function getId(): int
    {
        return $this->patient->getId();
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
