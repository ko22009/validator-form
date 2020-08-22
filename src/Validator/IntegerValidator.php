<?php

namespace App\Validator;

use App\Error;

class IntegerValidator extends BaseValidator
{

    public function validate(Error $error): bool
    {
        $value = $this->getValue();
        $regexInt = '/^\d+$/';
        if(is_string($value)) {
            preg_match($regexInt, $value, $matches);
        } else $matches = null;
        $isInt = is_int($value) || is_string($value) && $matches;

        if (!$isInt) $error->add($this->lang->get('NO_INT') . ': ' . $this->getName());

        return $isInt;
    }

}