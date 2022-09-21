<?php

namespace Ramaadi\Karyawanapp\Internal\Validation;

use Ramaadi\Karyawanapp\Internal\Validation\Rules\RequiredRule;

class Rule
{
    public static function required()
    {
        return new RequiredRule();
    }
}