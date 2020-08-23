<?php

namespace BeatStar\Pkg;

use BeatStar\Pkg\Jwt\Base64\SafeBase64Parser;
use BeatStar\Pkg\Jwt\Base64\Base64Parser;
use BeatStar\Pkg\Jwt\Cryptography\Verifier;
use BeatStar\Pkg\Jwt\Exceptions\JsonDecodingException;
use BeatStar\Pkg\Jwt\Exceptions\InvalidSignatureException;
use BeatStar\Pkg\Jwt\Exceptions\InvalidTokenException;
use BeatStar\Pkg\Jwt\Exceptions\ValidationException;
use BeatStar\Pkg\Jwt\Json\StrictJsonParser;
use BeatStar\Pkg\Jwt\Json\JsonParser;
use BeatStar\Pkg\Jwt\Validator\DefaultValidator;
use BeatStar\Pkg\Jwt\Validator\Validator;

class ParserPkg
{

    private $verifier, $validator, $jsonParser, $base64Parser;

    public function __construct(
        Verifier $verifier,
        Validator $validator = null,
        JsonParser $jsonParser = null,
        Base64Parser $base64Parser = null
    )
    {
        $this->setVerifier($verifier);
        $this->setValidator($validator ?: new DefaultValidator());
        $this->setJsonParser($jsonParser ?: new StrictJsonParser());
        $this->setBase64Parser($base64Parser ?: new SafeBase64Parser());
    }

    public function parse(string $jwt): array
    {
        list($header, $payload, $signature) = $this->explodeJwt($jwt);

        $this->verifySignature($header, $payload, $signature);

        $claims = $this->extractClaims($payload);

        $this->validator->validate($claims);

        return $claims;
    }

    private function explodeJwt(string $jwt): array
    {
        $sections = explode('.', $jwt);

        if (count($sections) != 3) {

            throw new InvalidTokenException('Token format is not valid');
            
        }

        return $sections;
    }

    public function verify(string $jwt)
    {
        list($header, $payload, $signature) = $this->explodeJwt($jwt);

        $this->verifySignature($header, $payload, $signature);
    }

    private function verifySignature(string $header, string $payload, string $signature)
    {
        $signature = $this->base64Parser->decode($signature);

        $this->verifier->verify("$header.$payload", $signature);
    }

    private function extractClaims(string $payload): array
    {
        return $this->jsonParser->decode($this->base64Parser->decode($payload));
    }

    public function validate(string $jwt)
    {
        list($header, $payload, $signature) = $this->explodeJwt($jwt);

        $this->verifySignature($header, $payload, $signature);

        $claims = $this->extractClaims($payload);

        $this->validator->validate($claims);
    }

    public function getJsonParser(): JsonParser
    {
        return $this->jsonParser;
    }

    public function setJsonParser(JsonParser $jsonParser)
    {
        $this->jsonParser = $jsonParser;
    }

    public function getBase64Parser(): Base64Parser
    {
        return $this->base64Parser;
    }

    public function setBase64Parser(Base64Parser $base64Parser)
    {
        $this->base64Parser = $base64Parser;
    }

    public function getVerifier(): Verifier
    {
        return $this->verifier;
    }

    public function setVerifier(Verifier $verifier)
    {
        $this->verifier = $verifier;
    }

    public function getValidator(): Validator
    {
        return $this->validator;
    }

    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
    }
}
