<?php

namespace BeatStar\Pkg\Jwt\Validator\Rules;

use BeatStar\Pkg\Jwt\Exceptions\ValidationException;
use BeatStar\Pkg\Jwt\Validator\Rule;

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
