<?php

namespace BeatStar\Pkg\Jwt\Validator\Rules;

use BeatStar\Pkg\Jwt\Exceptions\ValidationException;
use BeatStar\Pkg\Jwt\Validator\Rule;

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
