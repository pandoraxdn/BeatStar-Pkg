<?php

namespace Neo\Pkg\Jwt\Cryptography;

use Neo\Pkg\Jwt\Exceptions\InvalidSignatureException;
use Neo\Pkg\Jwt\Exceptions\SigningException;

interface Verifier
{
    public function verify(string $plain, string $signature);
}
