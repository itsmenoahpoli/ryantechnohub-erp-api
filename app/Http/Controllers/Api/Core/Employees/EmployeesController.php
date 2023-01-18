<?php

namespace App\Http\Controllers\Api\Core\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Repositories\Interfaces\IEmployeesRepository;

class EmployeesController extends Controller
{
    private IEmployeesRepository $repository;

    public function __construct(
        IEmployeesRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function employeeTimeEntry(Request $request)
    {
        try
        {
            $data = $this->repository->POSTimeEntry($request->all());

            return response()->json($data, 201);
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }
}
