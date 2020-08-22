<?php

namespace App\Comparator;

use App\Error;
use App\Validator\IntegerValidator;

class IntegerComparator extends BaseComparator
{

    protected function getFirstValue(Error $error)
    {
        $integerValidator = new IntegerValidator($this->value1, 'int');
        $isInt = $integerValidator->validate($error);
        if($isInt) return (int) $this->value1;
        else return null;
    }

    protected function getSecondValue(Error $error)
    {
        $integerValidator = new IntegerValidator($this->value2, 'int');
        $isInt = $integerValidator->validate($error);
        if($isInt) return (int) $this->value2;
        else return null;
    }

}