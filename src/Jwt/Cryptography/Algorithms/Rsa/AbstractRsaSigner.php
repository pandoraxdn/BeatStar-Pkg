<?php

namespace beatstar\pkg\Jwt\Cryptography\Algorithms\Rsa;

use beatstar\pkg\Jwt\Cryptography\Keys\RsaPrivateKey;
use beatstar\pkg\Jwt\Cryptography\Signer;
use beatstar\pkg\Jwt\Exceptions\SigningException;

abstract class AbstractRsaSigner implements Signer
{
    use Naming;

    protected $privateKey;

    public function __construct(RsaPrivateKey $publicKey)
    {
        $this->setPrivateKey($publicKey);
    }

    public function sign(string $message): string
    {
        $signature = '';

        if (openssl_sign($message, $signature, $this->privateKey->getResource(), $this->algorithm()) === true) {

            $this->privateKey->close();

            return $signature;

        }

        throw new SigningException();
    }

    public function getPrivateKey(): RsaPrivateKey
    {
        return $this->privateKey;
    }

    public function setPrivateKey(RsaPrivateKey $privateKey)
    {
        $this->privateKey = $privateKey;
    }
}
