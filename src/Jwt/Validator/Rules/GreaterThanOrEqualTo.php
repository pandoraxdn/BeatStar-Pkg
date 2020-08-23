<?php

namespace beatstar\pkg\Jwt\Validator\Rules;

use beatstar\pkg\Jwt\Exceptions\ValidationException;
use beatstar\pkg\Jwt\Validator\Rule;

class GreaterThanOrEqualTo implements Rule
{

    protected $number;

    public function __construct(float $number)
    {
        $this->number = $number;
    }

    public function validate(string $name, $value)
    {
        if ($value < $this->number) {

            throw new ValidationException($this->message($name));

        }
    }

    protected function message(string $name): string
    {
        return "The `$name` must be greater than or equal to `$this->number`.";
    }
}
