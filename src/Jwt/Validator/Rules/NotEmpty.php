<?php

namespace Neo\Pkg\Jwt\Validator\Rules;

use Neo\Pkg\Jwt\Exceptions\ValidationException;
use Neo\Pkg\Jwt\Validator\Rule;

class NotEmpty implements Rule
{
    public function validate(string $name, $value)
    {
        if (empty($value)) {

            $message = "The `$name` must not be empty.";

            throw new ValidationException($message);
            
        }
    }
}
