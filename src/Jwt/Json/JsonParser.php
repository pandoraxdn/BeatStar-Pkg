<?php

namespace BeatStar\Pkg\Jwt\Json;

use BeatStar\Pkg\Jwt\Exceptions\JsonDecodingException;
use BeatStar\Pkg\Jwt\Exceptions\JsonEncodingException;

interface JsonParser
{

    public function encode(array $data): string;

    public function decode(string $json): array;
    
}
