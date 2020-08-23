<?php

namespace Neo\Pkg\Jwt\Validator\Rules;

class NewerThan extends GreaterThan
{
    public function __construct(float $timestamp)
    {
        parent::__construct($timestamp);
    }

    protected function message(string $name): string
    {
        return "The `$name` must be newer than `$this->number`.";
    }
}
