<?php

namespace App\Modules\Patient\Service;

use App\Core\JWT\JWT;
use App\Core\JWT\JWTFactory;
use App\Core\JWT\JWTValidationStrategy;
use App\Modules\Auth\Api\AuthAPIFacade;
use App\Modules\Patient\Api\PatientAPIFacade;
use App\Modules\Auth\DTO\Response\LoginResponse;
use App\Modules\Auth\DTO\Response\ValidateResponse;
use App\Modules\Patient\DTO\Request\PatientCreationRequest;
use App\Modules\Patient\DTO\Request\PatientUpdateRequest;
use App\Modules\Patient\DTO\Response\PatientCreationResponse;
use App\Modules\Patient\DTO\Response\PatientFindAllResponse;
use App\Modules\Patient\DTO\Response\PatientFindResponse;
use App\Modules\Patient\DTO\Response\PatientUpdateResponse;
use App\Modules\User\UserAPIFacade;
use Framework\Exception\HttpException;
use Framework\Singleton\Router\HttpDefaultCodes;

class PatientService
{
    private PatientAPIFacade $patientAPIFacade;
    public function __construct()
    {
        $this->patientAPIFacade = new PatientAPIFacade();
    }

    public function create(PatientCreationRequest $request): PatientCreationResponse
    {
        return $this->patientAPIFacade->create($request);
    }

    public function findAll(): PatientFindAllResponse
    {
        return $this->patientAPIFacade->findAll();
    }

    public function find(string $id): PatientFindResponse
    {
        return $this->patientAPIFacade->find($id);
    }

    public function update(PatientUpdateRequest $request): PatientUpdateResponse
    {
        return $this->patientAPIFacade->update($request);
    }
}
