<?php

namespace Ramaadi\Karyawanapp\Internal;

use Ramaadi\Karyawanapp\Internal\Validation\Validator;

class Controller
{
    protected function view($fileName): View
    {
        $v = new View();

        return $v->from($fileName);
    }

    protected function formData(): array
    {
        return $_POST;
    }

//    protected function validate(array $rules): Validator
//    {
//        return new Validator(
//            fields: $this->formData(),
//            rules: $rules
//        );
//    }
}