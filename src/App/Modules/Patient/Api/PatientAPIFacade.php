<?php

namespace App\Modules\Patient\Api;

use App\Modules\Auth\DTO\Request\LoginRequest;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use App\Modules\Patient\DTO\Request\PatientCreationRequest;
use App\Modules\Patient\DTO\Request\PatientUpdateRequest;
use App\Modules\Patient\DTO\Response\PatientCreationResponse;
use App\Modules\Patient\DTO\Response\PatientDeleteResponse;
use App\Modules\Patient\DTO\Response\PatientFindAllResponse;
use App\Modules\Patient\DTO\Response\PatientFindResponse;
use App\Modules\Patient\DTO\Response\PatientUpdateResponse;
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
            "age" => $request->getAge(),
            "height" => $request->getHeight(),
            "weight" => $request->getWeight(),
            "name" => $request->getName(),
        ]);

        return PatientCreationResponse::fromData($response);
    }

    public function update(PatientUpdateRequest $request): PatientUpdateResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::PUT, sprintf(
            "%s/patient?id=%d",
            PATIENT_SERVICE_URL,
            $request->getId()
        ), [
            "age" => $request->getAge(),
            "height" => $request->getHeight(),
            "weight" => $request->getWeight(),
            "name" => $request->getName(),
        ]);

        return PatientUpdateResponse::fromData($response);
    }

    public function findAll(): PatientFindAllResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::GET, PATIENT_SERVICE_URL . "patient/findAll");

        return PatientFindAllResponse::fromData($response);
    }

    public function find(string $id): PatientFindResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::GET, PATIENT_SERVICE_URL . "patient", [
            "id" => $id
        ]);

        return PatientFindResponse::fromData($response);
    }

    public function delete(string $id): PatientDeleteResponse
    {
        $response = $this->httpRequestFacade->request(HttpMethods::DELETE, PATIENT_SERVICE_URL . "patient", [
            "id" => $id
        ]);

        return PatientDeleteResponse::fromData($response);
    }
}
