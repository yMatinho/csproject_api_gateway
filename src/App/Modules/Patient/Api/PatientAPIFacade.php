<?php

namespace App\Modules\Patient\Api;

use App\Modules\Auth\DTO\Request\LoginRequest;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use App\Modules\Patient\DTO\Request\PatientCreationRequest;
use App\Modules\Patient\DTO\Response\PatientCreationResponse;
use App\Modules\Patient\DTO\Response\PatientFindAllResponse;
use Framework\Http\HttpRequestFacade;
use Framework\Singleton\Router\HttpMethods;

class PatientAPIFacade
{
    private HttpRequestFacade $httpRequestFacade;
    public function __construct()
    {
        $this->httpRequestFacade = new HttpRequestFacade();
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

    public function findAll(): PatientFindAllResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::GET, PATIENT_SERVICE_URL . "patient/findAll");

        return PatientFindAllResponse::fromData($response);
    }
}
