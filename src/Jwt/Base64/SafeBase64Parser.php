<?php

namespace BeatStar\Pkg\Jwt\Base64;

class SafeBase64Parser implements Base64Parser
{

    public function encode(string $data): string
    {
        return str_replace('=', '', strtr(base64_encode($data), '+/', '-_'));
    }

    public function decode(string $data): string
    {
        if ($remainder = strlen($data) % 4) {

            $paddingLength = 4 - $remainder;

            $data .= str_repeat('=', $paddingLength);
            
        }

        return base64_decode(strtr($data, '-_', '+/'));
    }
}
