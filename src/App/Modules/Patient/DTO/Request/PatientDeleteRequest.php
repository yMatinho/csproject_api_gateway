<?php

namespace App\Modules\Patient\DTO\Request;

use App\Modules\Patient\DTO\Patient;
use Framework\Request\Request;

class PatientDeleteRequest
{

    public function __construct(
        private int $id
    ) {
    }

    public static function fromRequest(Request $data): PatientDeleteRequest
    {
        return new PatientDeleteRequest(
            $data->id
        );
    }

    public function getId(): int {
        return $this->id;
    }
}
