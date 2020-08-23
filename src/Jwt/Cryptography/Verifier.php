<?php

namespace BeatStar\Pkg\Jwt\Cryptography;

use BeatStar\Pkg\Jwt\Exceptions\InvalidSignatureException;
use BeatStar\Pkg\Jwt\Exceptions\SigningException;

interface Verifier
{
    public function verify(string $plain, string $signature);
}
