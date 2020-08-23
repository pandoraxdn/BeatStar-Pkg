<?php

namespace beatstar\pkg\Jwt\Cryptography\Algorithms\Hmac;

use beatstar\pkg\Jwt\Cryptography\Signer;
use beatstar\pkg\Jwt\Cryptography\Verifier;
use beatstar\pkg\Jwt\Exceptions\InvalidKeyException;
use beatstar\pkg\Jwt\Exceptions\InvalidSignatureException;
use beatstar\pkg\Jwt\Exceptions\SigningException;

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
