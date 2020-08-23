<?php

namespace BeatStar\Pkg\Jwt\Validator\Rules;

use BeatStar\Pkg\Jwt\Exceptions\ValidationException;
use BeatStar\Pkg\Jwt\Validator\Rule;

class ConsistsOf implements Rule
{
    private $substr;

    public function __construct(string $substr)
    {
        $this->substr = $substr;
    }

    public function validate(string $name, $value)
    {
        if (strpos($value, $this->substr) === false) {

            $message = "The `$name` must consist of `$this->substr`.";

            throw new ValidationException($message);
            
        }
    }
}
