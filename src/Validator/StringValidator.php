<?php

namespace App\Validator;

use App\Error;

class StringValidator extends BaseValidator
{

    public function validate(Error $error): bool
    {
        $isString = is_string($this->getValue());

        if (!$isString) $error->add($this->lang->get('NO_STRING') . ': ' . $this->getName());

        return $isString;
    }

}