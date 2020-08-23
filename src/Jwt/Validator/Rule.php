<?php

namespace Neo\Pkg\Jwt\Validator;

use Neo\Pkg\Jwt\Exceptions\ValidationException;

interface Rule
{
    public function validate(string $name, $value);
}
