<?php

namespace BeatStar\Pkg\Jwt\Validator\Rules;

use BeatStar\Pkg\Jwt\Exceptions\ValidationException;
use BeatStar\Pkg\Jwt\Validator\Rule;

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
