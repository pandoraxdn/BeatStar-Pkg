<?php

namespace BeatStar\Pkg\Jwt\Validator;

use BeatStar\Pkg\Jwt\Exceptions\ValidationException;

interface Rule
{
    public function validate(string $name, $value);
}
