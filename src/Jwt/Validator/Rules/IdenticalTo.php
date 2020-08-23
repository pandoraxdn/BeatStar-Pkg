<?php

namespace BeatStar\Pkg\Jwt\Validator\Rules;

use BeatStar\Pkg\Jwt\Exceptions\ValidationException;
use BeatStar\Pkg\Jwt\Validator\Rule;

class IdenticalTo implements Rule
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function validate(string $name, $value)
    {
        if ($this->value !== $value) {

            $message = "The `$name` must be identical to `$this->value`.";

            throw new ValidationException($message);
            
        }
    }
}
