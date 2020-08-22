<?php

namespace App\Comparator;

use App\Error;
use App\Validator\IntegerValidator;

class IntegerComparator extends BaseComparator
{

    protected function getFirstValue(Error $error)
    {
        $integerValidator = new IntegerValidator($this->value1, 'int');
        return $integerValidator->validate($error) ? (int) $this->value1 : null;
    }

    protected function getSecondValue(Error $error)
    {
        $integerValidator = new IntegerValidator($this->value2, 'int');
        return $integerValidator->validate($error) ? (int) $this->value2 : null;
    }

}