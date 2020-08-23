<?php

namespace beatstar\pkg;

use beatstar\pkg\Jwt\Base64\SafeBase64Parser;
use beatstar\pkg\Jwt\Base64\Base64Parser;
use beatstar\pkg\Jwt\Cryptography\Signer;
use beatstar\pkg\Jwt\Json\StrictJsonParser;
use beatstar\pkg\Jwt\Json\JsonParser;

class GeneratorPkg
{
    private $signer, $jsonParser, $base64Parser;

    public function __construct(
        Signer $signer,
        JsonParser $jsonParser = null,
        Base64Parser $base64Parser = null
    )
    {
        $this->setSigner($signer);
        $this->setJsonParser($jsonParser ?: new StrictJsonParser());
        $this->setBase64Parser($base64Parser ?: new SafeBase64Parser());
    }

    public function generate(array $claims = []): string
    {
        $header = $this->base64Parser->encode($this->jsonParser->encode($this->header()));
        $payload = $this->base64Parser->encode($this->jsonParser->encode($claims));
        $signature = $this->base64Parser->encode($this->signer->sign("$header.$payload"));

        return join('.', [$header, $payload, $signature]);
    }

    private function header(): array
    {
        return ['alg' => $this->signer->name(), 'typ' => 'JWT'];
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

    public function getSigner(): Signer
    {
        return $this->signer;
    }

    public function setSigner(Signer $signer)
    {
        $this->signer = $signer;
    }
}
