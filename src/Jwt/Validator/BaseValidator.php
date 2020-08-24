<?php

namespace beatstar\pkg\Jwt\Validator;

use beatstar\pkg\Jwt\Exceptions\ValidationException;

class BaseValidator implements Validator
{

    protected $rules = [];

    public function addRule(string $claimName, Rule $rule, bool $required = true)
    {
        $this->rules[$claimName][] = [$rule, $required];
    }

    public function validate(array $claims = [])
    {
        foreach ($this->rules as $claimName => $rules) {

            $exists = isset($claims[$claimName]);
            
            $value = $exists ? $claims[$claimName] : null;

            foreach ($rules as $ruleAndState) {

                list($rule, $required) = $ruleAndState;

                if ($exists) {

                    $rule->validate($claimName, $value);

                } elseif ($required) {

                    $message = "The `$claimName` is required.";

                    throw  new ValidationException($message);

                }
            }
        }
    }
}
