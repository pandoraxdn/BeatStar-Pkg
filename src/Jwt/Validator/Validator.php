<?php

namespace beatstar\pkg\Jwt\Validator;

use beatstar\pkg\Jwt\Exceptions\ValidationException;

interface Validator
{
    public function validate(array $claims = []);
}
