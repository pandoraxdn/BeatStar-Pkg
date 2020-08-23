<?php

namespace BeatStar\Pkg\Jwt\Validator;

use BeatStar\Pkg\Jwt\Enums\PublicClaimNames;
use BeatStar\Pkg\Jwt\Validator\Rules\NewerThan;
use BeatStar\Pkg\Jwt\Validator\Rules\OlderThanOrSame;

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
