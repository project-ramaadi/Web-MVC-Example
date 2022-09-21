<?php

namespace Ramaadi\Karyawanapp\Models;

use Ramaadi\Karyawanapp\Internal\Model;

class Office extends Model
{

    protected function sessionModelName(): string
    {
        return "offices";
    }

    public function delete(int $id)
    {
        (new EmployeeLocation())->truncateByOffice($id);
        parent::delete($id);
    }
}