<?php

namespace App\Modules\Patient\DTO\Response;

use App\Modules\Patient\DTO\Patient;
use Framework\Request\Request;

class PatientCreationResponse
{

    public function __construct(
        private Patient $patient
    ) {
    }

    public static function fromData(object $data): PatientCreationResponse
    {
        return new PatientCreationResponse(
            Patient::fromData($data->patient)
        );
    }

    public function getPatient(): Patient
    {
        return $this->patient;
    }

    public function getId(): ?int {
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

    public function getCreatedAt(): ?string {
        return $this->patient->getCreatedAt();
    }

    public function getUpdatedAt(): ?string {
        return $this->patient->getUpdatedAt();
    }


    public function toArray(): array {
        return [
            "id"=>$this->getId(),
            "name"=>$this->getName(),
            "age"=>$this->getAge(),
            "weight"=>$this->getWeight(),
            "height"=>$this->getHeight(),
            "createdAt"=>$this->getCreatedAt(),
            "updatedAt"=>$this->getUpdatedAt()
        ];
    }
}
