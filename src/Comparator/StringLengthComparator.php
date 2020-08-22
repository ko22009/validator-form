<?php

namespace App\Comparator;

use App\Error;
use App\Validator\StringValidator;

class StringLengthComparator extends BaseComparator
{

    private $first;

    public function __construct($string, $comparator, $length)
    {
        $this->first = strlen($string);
        parent::__construct($string, $comparator, $length);
    }

    protected function getFirstValue(Error $error)
    {
        $dateTimeValidator = new StringValidator($this->value1, 'string');
        $isString = $dateTimeValidator->validate($error);
        if($isString) return $this->first;
        else return null;
    }

}