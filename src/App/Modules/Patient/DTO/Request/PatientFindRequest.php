<?php

namespace App\Modules\Patient\DTO\Request;

use App\Modules\Patient\DTO\Patient;
use Framework\Request\Request;

class PatientFindRequest
{

    public function __construct(
        private int $id
    ) {
    }

    public static function fromRequest(Request $data): PatientFindRequest
    {
        return new PatientFindRequest(
            $data->id
        );
    }

    public function getId(): int {
        return $this->id;
    }
}
