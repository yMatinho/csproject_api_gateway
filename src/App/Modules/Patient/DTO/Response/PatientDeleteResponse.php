<?php

namespace App\Modules\Patient\DTO\Response;

use App\Modules\Patient\DTO\Patient;
use Framework\Request\Request;

class PatientDeleteResponse
{

    public function __construct(
        private string $message
    ) {
    }

    public static function fromData(object $data): PatientDeleteResponse
    {
        return new PatientDeleteResponse(
            $data->message
        );
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function toArray(): array {
        return [
            "message"=>$this->getMessage()
        ];
    }
}
