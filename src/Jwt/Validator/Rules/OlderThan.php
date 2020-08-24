<?php

namespace beatstar\pkg\Jwt\Validator\Rules;

class OlderThan extends LessThan
{
    public function __construct(float $timestamp)
    {
        parent::__construct($timestamp);
    }
    
    protected function message(string $name): string
    {
        return "The `$name` must be older than `$this->number`.";
    }
}
