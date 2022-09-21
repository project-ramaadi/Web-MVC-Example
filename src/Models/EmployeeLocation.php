<?php

namespace Ramaadi\Karyawanapp\Models;

use Ramaadi\Karyawanapp\Internal\Model;

class EmployeeLocation extends Model
{

    protected function sessionModelName(): string
    {
        return "employees_offices";
    }

    public function formattedGet(): array
    {
        $data = [];

        foreach ($this->all() as $key => $value) {
            [$employee_id, $office_id] = explode('_', $key);


            $data[] = [
                'id' => $key,
                'office_id' => $office_id,
                'employee_id' => $employee_id,
                'office' => (new Office())->get($office_id)['name'],
                'employee' => (new Employee())->get($employee_id)['name']
            ];
        }

        return $data;
    }

    public function attach($employee_id, $office_id)
    {
        $this->fixEmptyModel();
        $_SESSION[$this->sessionModelName()]["{$employee_id}_$office_id"] = "_";
    }


    public function detach($employee_id, $office_id)
    {
        $this->fixEmptyModel();
        unset($_SESSION[$this->sessionModelName()]["{$employee_id}_$office_id"]);
    }

    public function truncateByEmployee($employee_id)
    {
        $this->fixEmptyModel();
        foreach ($this->all() as $key => $_) {
            $data = explode("_", $key);
            if ($data[0] == $employee_id) {
                $this->detach($data[0], $data[1]);
            }
        }
    }

    public function truncateByOffice($office_id)
    {
        $this->fixEmptyModel();
        foreach ($this->all() as $key => $_) {
            $data = explode("_", $key);
            if ($data[1] == $office_id) {
                $this->detach($data[0], $data[1]);
            }
        }
    }
}