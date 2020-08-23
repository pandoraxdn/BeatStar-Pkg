<?php

namespace beatstar\pkg\Jwt\Validator\Rules;

class NewerThanOrSame extends GreaterThanOrEqualTo
{
    public function __construct(float $timestamp)
    {
        parent::__construct($timestamp);
    }

    protected function message(string $name): string
    {
        return "The `$name` must be newer than or same `$this->number`.";
    }
}
