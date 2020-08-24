<?php

namespace beatstar\pkg\Jwt\Validator;

use beatstar\pkg\Jwt\Exceptions\ValidationException;

interface Rule
{
    public function validate(string $name, $value);
}
