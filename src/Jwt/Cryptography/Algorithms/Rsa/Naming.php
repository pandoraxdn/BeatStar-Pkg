<?php

namespace BeatStar\Pkg\Jwt\Cryptography\Algorithms\Rsa;

trait Naming
{

    protected static $name;

    public function name(): string
    {
        return static::$name;
    }

    protected function algorithm()
    {
        $table = [
            'RS256' => OPENSSL_ALGO_SHA256,
            'RS384' => OPENSSL_ALGO_SHA384,
            'RS512' => OPENSSL_ALGO_SHA512,
        ];

        return $table[$this->name()];
    }
}
