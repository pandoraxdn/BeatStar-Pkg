<?php

namespace Neo\Pkg\Jwt\Validator\Rules;

use BeatStar\Pkg\Jwt\Exceptions\ValidationException;
use BeatStar\Pkg\Jwt\Validator\Rule;

class LessThan implements Rule
{
    protected $number;

    public function __construct(float $number)
    {
        $this->number = $number;
    }

    public function validate(string $name, $value)
    {
        if ($value >= $this->number) {

            throw new ValidationException($this->message($name));

        }
    }
    
    protected function message(string $name): string
    {
        return "The `$name` must be less than `$this->number`.";
    }
}
