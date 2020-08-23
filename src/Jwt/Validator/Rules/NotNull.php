<?php

namespace Neo\Pkg\Jwt\Validator\Rules;

use Neo\Pkg\Jwt\Exceptions\ValidationException;
use Neo\Pkg\Jwt\Validator\Rule;

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
