<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IEmployeesRepository;
use App\Models\Employees\Employee;
use App\Models\Employees\EmployeeTimeEntry;
use App\Services\FilesService;

use DB;

class EmployeesRepositories implements IEmployeesRepository
{
    public function POSTimeEntry($type, $data)
    {
        //
    }

    public function POSSignIn($data)
    {
        //
    }

    public function POSSignOut($data)
    {
        //
    }

    public function POStimeEntries($employeeId)
    {
        //
    }
}
