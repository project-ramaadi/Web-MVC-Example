<?php

namespace Ramaadi\Karyawanapp\Controllers;

use Exception;
use Ramaadi\Karyawanapp\Internal\Controller;
use Ramaadi\Karyawanapp\Internal\SessionFlashStorage;
use Ramaadi\Karyawanapp\Models\Employee;

class EmployeeController extends Controller
{
    private Employee $employee;

    public function __construct()
    {
        $this->employee = new Employee();
    }

    /**
     * @throws Exception
     */
    public function index()
    {
        return $this
            ->view('employees')
            ->with([
                'employees' => $this->employee->all(),
                'mode' => 'list'
            ])
            ->render();
    }

    public function edit($id)
    {
        return $this
            ->view('employees')
            ->with([
                'edit_id' => $id,
                'employees' => $this->employee->all(),
                'edit' => $this->employee->get($id),
                'mode' => 'edit'
            ])->render();
    }

    public function update($id)
    {
        $employee = $this
            ->employee
            ->update($id, $this->formData());
        SessionFlashStorage::addFlash(
            'success_message',
            "Edited the employee {$employee['name']} successfylly!"
        );
        header("Location: /employees");
    }

    public function delete($id)
    {
        $this->employee->delete($id);

        SessionFlashStorage::addFlash(
            'success_message',
            'Employee deleted successfully!'
        );

        header("Location: /employees");
    }

    public function create()
    {

        $this->employee->create([
            'name' => $this->formData()['name'],
            'position' => $this->formData()['position'],
            'age' => $this->formData()['age']
        ]);

        SessionFlashStorage::addFlash(
            'success_message',
            'You\'ve created an employee!'
        );

        header("Location: /employees");
    }
}