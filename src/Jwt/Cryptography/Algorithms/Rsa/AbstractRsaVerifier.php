<?php

namespace Neo\Pkg\Jwt\Cryptography\Algorithms\Rsa;

use Neo\Pkg\Jwt\Cryptography\Keys\RsaPublicKey;
use Neo\Pkg\Jwt\Cryptography\Verifier;
use Neo\Pkg\Jwt\Exceptions\InvalidSignatureException;

abstract class AbstractRsaVerifier implements Verifier
{
    use Naming;

    protected $publicKey;

    public function __construct(RsaPublicKey $key)
    {
        $this->setPublicKey($key);
    }

    public function verify(string $plain, string $signature)
    {
        if (openssl_verify($plain, $signature, $this->publicKey->getResource(), $this->algorithm()) !== 1) {

            throw new InvalidSignatureException();
            
        }

        $this->publicKey->close();
    }

    public function getPublicKey(): RsaPublicKey
    {
        return $this->publicKey;
    }

    public function setPublicKey(RsaPublicKey $publicKey)
    {
        $this->publicKey = $publicKey;
    }
}
