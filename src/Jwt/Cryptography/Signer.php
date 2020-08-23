<?php

namespace beatstar\pkg\Jwt\Cryptography;

use beatstar\pkg\Jwt\Exceptions\SigningException;

interface Signer
{
    public function name(): string;
    
    public function sign(string $message): string;
}
