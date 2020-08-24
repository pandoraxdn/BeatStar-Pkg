<?php

namespace beatstar\pkg\Jwt\Validator;

use beatstar\pkg\Jwt\Enums\PublicClaimNames;
use beatstar\pkg\Jwt\Validator\Rules\NewerThan;
use beatstar\pkg\Jwt\Validator\Rules\OlderThanOrSame;

class DefaultValidator extends BaseValidator
{
    public function __construct()
    {
        $this->addRule(
            PublicClaimNames::EXPIRATION_TIME,
            new NewerThan(time()),
            false
        );

        $this->addRule(
            PublicClaimNames::NOT_BEFORE,
            new OlderThanOrSame(time()),
            false
        );
        
        $this->addRule(
            PublicClaimNames::ISSUED_AT,
            new OlderThanOrSame(time()),
            false
        );
    }
}
