<?php

namespace Ramaadi\Karyawanapp\Internal\Validation;

interface ValidationRule
{
    public function passes(mixed $input): bool;

    public function message(string $fieldName): string;
}