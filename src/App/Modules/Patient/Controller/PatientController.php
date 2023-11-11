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
        return $this->patientService->find($request->id)->toArray();
    }

    public function create(Request $request)
    {
        $dto = PatientCreationRequest::fromRequest($request);
        
        return $this->patientService->create($dto)->toArray();
    }
}
