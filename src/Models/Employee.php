<?php

namespace Ramaadi\Karyawanapp\Models;

use Ramaadi\Karyawanapp\Internal\Model;

class Employee extends Model
{
    protected function sessionModelName(): string
    {
        return "employees";
    }

    public function delete(int $id)
    {
        (new EmployeeLocation())->truncateByEmployee($id);
        parent::delete($id);
    }
}