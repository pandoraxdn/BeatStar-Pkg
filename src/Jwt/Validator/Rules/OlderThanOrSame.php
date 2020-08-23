<?php

namespace beatstar\pkg\Jwt\Validator\Rules;

class OlderThanOrSame extends LessThanOrEqualTo
{
    public function __construct(float $timestamp)
    {
        parent::__construct($timestamp);
    }

    protected function message(string $name): string
    {
        return "The `$name` must be older than or same `$this->number`.";
    }
}
