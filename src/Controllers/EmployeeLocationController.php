<?php

namespace Ramaadi\Karyawanapp\Controllers;

use Ramaadi\Karyawanapp\Internal\Controller;
use Ramaadi\Karyawanapp\Internal\SessionFlashStorage;
use Ramaadi\Karyawanapp\Models\Employee;
use Ramaadi\Karyawanapp\Models\EmployeeLocation;
use Ramaadi\Karyawanapp\Models\Office;

class EmployeeLocationController extends Controller
{
    private EmployeeLocation $employeeLocation;
    private Office $office;
    private Employee $employee;

    public function __construct()
    {
        $this->employeeLocation = new EmployeeLocation();
        $this->employee = new Employee();
        $this->office = new Office();
    }

    public function index(): bool|string
    {
        return $this
            ->view('locations')
            ->with([
                'offices' => $this->office->all(),
                'employees' => $this->employee->all(),
                'employeeLocation' => $this->employeeLocation->formattedGet()
            ])->render();
    }

    public function create()
    {

        $this->employeeLocation->attach(
            employee_id: $this->formData()['employee_id'],
            office_id: $this->formData()['office_id']
        );

        SessionFlashStorage::addFlash(
            'success_message',
            "You've attached an employee {$this->employee->get($this->formData()['employee_id'])} to the {$this->office->get($this->formData()['office_id'])} office!"
        );

        header("Location: /locations");
    }


    public function delete($id)
    {
        [$employee_id, $office_id] = explode("_", $id);

        $this->employeeLocation->detach(
            employee_id: $employee_id,
            office_id: $office_id
        );

        SessionFlashStorage::addFlash(
            'success_message',
            'Removed the employee from the office location!'
        );

        header("Location: /locations");
    }
}