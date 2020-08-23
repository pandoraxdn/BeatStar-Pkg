<?php

namespace Laravel\Pkg\Jwt\Cryptography\Keys;

use Laravel\Pkg\Jwt\Exceptions\InvalidKeyException;

class RsaPublicKey
{
    private $resource;

    public function __construct(string $filePath)
    {
        $this->resource = openssl_pkey_get_public('file:///' . $filePath);

        if (empty($this->resource)) {

            throw new InvalidKeyException();
            
        }
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function close()
    {
        openssl_free_key($this->getResource());
    }
}
