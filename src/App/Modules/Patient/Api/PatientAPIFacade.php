<?php

namespace App\Modules\Auth\Api;

use App\Modules\Auth\DTO\Request\LoginRequest;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use App\Modules\Patient\DTO\Request\PatientCreationRequest;
use App\Modules\Patient\DTO\Response\PatientCreationResponse;
use Framework\Http\HttpRequestFacade;
use Framework\Singleton\Router\HttpMethods;

class PatientAPIFacade
{
    private HttpRequestFacade $httpRequestFacade;
    public function __construct()
    {
    }

    public function create(PatientCreationRequest $request): PatientCreationResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::POST, PATIENT_SERVICE_URL . "patient", [
            "age"=>$request->getAge(),
            "height"=>$request->getHeight(),
            "name"=>$request->getName(),
        ]);

        return PatientCreationResponse::fromData($response);
    }
}
