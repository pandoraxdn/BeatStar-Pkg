<?php

namespace Neo\Pkg\Jwt\Validator;

use Neo\Pkg\Jwt\Exceptions\ValidationException;

interface Validator
{
    public function validate(array $claims = []);
}
