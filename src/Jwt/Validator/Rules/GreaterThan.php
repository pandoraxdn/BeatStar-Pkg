<?php

namespace Neo\Pkg\Jwt\Validator\Rules;

use Neo\Pkg\Jwt\Exceptions\ValidationException;
use Neo\Pkg\Jwt\Validator\Rule;

class GreaterThan implements Rule
{
    protected $number;

    public function __construct(float $number)
    {
        $this->number = $number;
    }

    public function validate(string $name, $value)
    {
        if ($value <= $this->number) {

            throw new ValidationException($this->message($name));

        }
    }

    protected function message(string $name): string
    {
        return "The `$name` must be greater than `$this->number`.";
    }
}
