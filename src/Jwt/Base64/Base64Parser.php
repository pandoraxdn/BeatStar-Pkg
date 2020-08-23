<?php

namespace Neo\Pkg\Jwt\Base64;

interface Base64Parser
{
	public function encode(string $data): string;

    public function decode(string $data): string;
}