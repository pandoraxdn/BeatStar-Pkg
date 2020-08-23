<?php

namespace Neo\Pkg\Jwt\Json;

use Neo\Pkg\Jwt\Exceptions\JsonDecodingException;
use Neo\Pkg\Jwt\Exceptions\JsonEncodingException;

interface JsonParser
{

    public function encode(array $data): string;

    public function decode(string $json): array;
    
}
