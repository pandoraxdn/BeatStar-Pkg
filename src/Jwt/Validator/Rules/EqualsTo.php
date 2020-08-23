<?php

namespace Neo\Pkg\Jwt\Validator\Rules;

use Neo\Pkg\Jwt\Exceptions\ValidationException;
use Neo\Pkg\Jwt\Validator\Rule;

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
