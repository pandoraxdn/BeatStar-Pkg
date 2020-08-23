<?php

namespace beatstar\pkg\Jwt\Validator\Rules;

use beatstar\pkg\Jwt\Exceptions\ValidationException;
use beatstar\pkg\Jwt\Validator\Rule;

class NotNull implements Rule
{
    public function validate(string $name, $value)
    {
        if ($value === null) {

            $message = "The `$name` must not be null.";

            throw new ValidationException($message);
            
        }
    }
}
