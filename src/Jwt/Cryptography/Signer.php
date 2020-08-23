<?php

namespace Neo\Pkg\Jwt\Cryptography;

use Neo\Pkg\Jwt\Exceptions\SigningException;

interface Signer
{
    public function name(): string;
    
    public function sign(string $message): string;
}
