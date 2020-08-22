<?php

namespace App\Validator;

use App\Error;

class EmailValidator extends BaseValidator
{

    public function validate(Error $error): bool
    {
        $value = $this->getValue();
        $isEmail = filter_var($value, FILTER_VALIDATE_EMAIL);

        if (!$isEmail) $error->add($this->lang->get('NO_EMAIl') . ': ' . $this->getName());

        return $isEmail;
    }

}