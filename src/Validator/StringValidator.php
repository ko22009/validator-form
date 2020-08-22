<?php declare(strict_types=1);

namespace App\Validator;

use App\Error;

class StringValidator extends BaseValidator
{

    public function validate(Error $error): bool
    {
        $condition = is_string($this->getValue());

        if (!$condition) $error->add($this->lang->get('NO_STRING') . ': ' . $this->getName());

        return $condition;
    }

}