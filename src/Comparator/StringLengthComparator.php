<?php

namespace App\Comparator;

use App\Error;
use App\Validator\StringValidator;

class StringLengthComparator extends BaseComparator
{

    protected function getFirstValue(Error $error)
    {
        $dateTimeValidator = new StringValidator($this->value1, 'string');
        return $dateTimeValidator->validate($error) ? strlen($this->value1) : null;
    }

}