<?php

namespace BeatStar\Pkg\Jwt\Cryptography\Algorithms\Hmac;

use BeatStar\Pkg\Jwt\Cryptography\Signer;
use BeatStar\Pkg\Jwt\Cryptography\Verifier;
use BeatStar\Pkg\Jwt\Exceptions\InvalidKeyException;
use BeatStar\Pkg\Jwt\Exceptions\InvalidSignatureException;
use BeatStar\Pkg\Jwt\Exceptions\SigningException;

abstract class AbstractHmac implements Signer, Verifier
{

    protected static $name;

    protected $key;

    public function __construct(string $key)
    {
        $this->setKey($key);
    }

    public function sign(string $message): string
    {
        $signature = hash_hmac($this->algorithm(), $message, $this->key, true);

        if ($signature === false) {

            throw new SigningException();

        }

        return $signature;
    }

    public function verify(string $plain, string $signature)
    {
        if ($signature != $this->sign($plain)) {

            throw new InvalidSignatureException();
            
        }
    }

    protected function algorithm(): string
    {
        return 'sha' . substr($this->name(), 2);
    }

    public function name(): string
    {
        return static::$name;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key)
    {
        if (strlen($key) < 32 || strlen($key) > 6144) {

            throw new InvalidKeyException();

        }

        $this->key = $key;
    }
}
