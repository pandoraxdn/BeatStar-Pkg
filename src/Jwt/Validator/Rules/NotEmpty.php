<?php

namespace Bbeatstar\pkg\Jwt\Validator\Rules;

use beatstar\pkg\Jwt\Exceptions\ValidationException;
use beatstar\pkg\Jwt\Validator\Rule;

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
