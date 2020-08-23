<?php

namespace BeatStar\Pkg\Jwt\Cryptography;

use BeatStar\Pkg\Jwt\Exceptions\SigningException;

interface Signer
{
    public function name(): string;
    
    public function sign(string $message): string;
}
