<?php

namespace Ramaadi\Karyawanapp\Internal\Validation\Rules;

use Ramaadi\Karyawanapp\Internal\Validation\ValidationRule;

class RequiredRule implements ValidationRule
{
    public function passes(mixed $input): bool
    {
        if (!isset($input)) return false;
        if (empty($input)) return false;
        if ($input == "") return false;

        return true;
    }

    public function message(string $fieldName): string
    {
        return "{$fieldName} is required!";
    }

}