<?php

namespace beatstar\pkg\Jwt\Validator\Rules;

use beatstar\pkg\Jwt\Exceptions\ValidationException;
use beatstar\pkg\Jwt\Validator\Rule;

class EqualsTo implements Rule
{

    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function validate(string $name, $value)
    {
        if ($this->value != $value) {

            $message = "The `$name` must equal to `$this->value`.";

            throw new ValidationException($message);
            
        }
    }
}
