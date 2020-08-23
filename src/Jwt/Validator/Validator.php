<?php

namespace BeatStar\Pkg\Jwt\Validator;

use BeatStar\Pkg\Jwt\Exceptions\ValidationException;

interface Validator
{
    public function validate(array $claims = []);
}
