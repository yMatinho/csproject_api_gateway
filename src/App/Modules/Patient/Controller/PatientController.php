<?php

namespace App\Modules\Patient\Controller;

use App\Core\ErrorHandler\JsonHandler;
use App\Core\JWT\JWTFactory;
use App\Modules\Auth\DTO\Request\LoginRequest;
use App\Modules\Auth\DTO\Request\ValidateRequest;
use App\Modules\Auth\Resource\TokenResource;
use App\Modules\Auth\Resource\ValidationResource;
use App\Modules\Auth\Service\AuthService;
use App\Modules\Patient\DTO\Request\PatientCreationRequest;
use App\Modules\Patient\DTO\Request\PatientDeleteRequest;
use App\Modules\Patient\DTO\Request\PatientFindRequest;
use App\Modules\Patient\DTO\Request\PatientUpdateRequest;
use App\Modules\Patient\Service\PatientService;
use App\Modules\User\UserAPIFacade;
use Framework\Controller\Controller;
use Framework\Exception\HttpException;
use Framework\Request\Request;
use Framework\Response\JsonResource;
use Framework\Singleton\Router\HttpDefaultCodes;

class PatientController extends Controller
{
    private PatientService $patientService;

    public function __construct()
    {
        $this->errorHandler = new JsonHandler();
        $this->patientService = new PatientService();
    }

    public function findAll()
    {
        return $this->patientService->findAll()->toArray();
    }

    public function find(Request $request)
    {
        return $this->patientService->find(PatientFindRequest::fromRequest($request)->getId())->toArray();
    }

    public function create(Request $request)
    {        
        return $this->patientService->create(PatientCreationRequest::fromRequest($request))->toArray();
    }

    public function update(Request $request)
    {        
        return $this->patientService->update(PatientUpdateRequest::fromRequest($request))->toArray();
    }

    public function delete(Request $request)
    {        
        return $this->patientService->delete(PatientDeleteRequest::fromRequest($request)->getId())->toArray();
    }
}
