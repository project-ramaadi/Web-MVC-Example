<?php

namespace Ramaadi\Karyawanapp\Internal\Validation;

use Illuminate\Validation\ValidationException;

class Validator
{
    private array $errors = [];
    private array $validatedFields = [];

    public function __construct(
        private array $fields,
        private array $rules
    )
    {
        foreach ($this->fields as $inputName => $inputValue) {

            if (!is_string($inputValue)) throw new ValidationException(
                message: "The fields key must be a valid string!"
            );

            if (is_array($this->rules[$inputValue])) {
                /** @var ValidationRule $rule */
                foreach ($this->rules[$inputValue] as $rule) {

                    if (!$rule instanceof ValidationRule) throw new ValidationException(
                        message: sprintf("%s does not implement ValidationRule", $inputValue)
                    );

                    if ($rule->passes($inputValue))
                        $this->putPass($inputName, $inputValue);
                    else $this->putError($inputName, $rule->message($inputName));

                }
            }

            if (!is_array($this->rules[$inputName])) {
                if (!$this->rules[$inputName] instanceof ValidationRule) throw new ValidationException(
                    message: sprintf("%s does not implement ValidationRule", $inputValue)
                );

                /** @var ValidationRule $rule */
                $rule = $this->rules[$inputName];

                if ($rule->passes($inputValue))
                    $this->putPass($inputName, $inputValue);
                else $this->putError($inputName, $rule->message($inputName));
            }

        }
    }

    public function passes(): bool
    {
        return count($this->errors) < 1;
    }

    public function validated(): array
    {
        return $this->validatedFields;
    }

    public function errors(): array
    {
        return $this->errors;
    }

    private function putPass($input, $value): void
    {
        $this->validatedFields[$input] = $value;
    }

    private function putError($input, $value): void
    {
        $this->errors[$input][] = $value;
    }
}