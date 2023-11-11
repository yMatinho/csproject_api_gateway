<?php

namespace App\Modules\Patient\DTO\Response;

use App\Modules\Patient\DTO\Patient;
use Framework\Request\Request;

class PatientFindAllResponse
{

    public function __construct(
        private array $patients
    ) {
    }

    public static function fromData(object $data): PatientFindAllResponse
    {
        $convertedPatients = array_map(function ($rawPatientData) {
            return Patient::fromData($rawPatientData);
        }, $data->patients);

        return new PatientFindAllResponse(
            $convertedPatients
        );
    }

    public function getPatients(): array
    {
        return $this->patients;
    }

    public function toArray(): array
    {
        return [
            "patients" => array_map(function (Patient $patient) {
                return $patient->toArray();
            }, $this->patients)
        ];
    }
}
