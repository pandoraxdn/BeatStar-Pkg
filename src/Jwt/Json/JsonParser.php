<?php

namespace beatstar\pkg\Jwt\Json;

use beatstar\pkg\Jwt\Exceptions\JsonDecodingException;
use beatstar\pkg\Jwt\Exceptions\JsonEncodingException;

interface JsonParser
{

    public function encode(array $data): string;

    public function decode(string $json): array;
    
}
