<?php

namespace App\Comparator;

use App\Error;
use App\Validator\DateTimeValidator;

class DateTimeComparator extends BaseComparator
{

    public function __construct($date1, $comparator, $date2)
    {
        parent::__construct($date1, $comparator, $date2);
    }

    protected function getFirstValue(Error $error)
    {
        $dateTimeValidator = new DateTimeValidator($this->value1, 'dateTime');
        $isDateTime = $dateTimeValidator->validate($error);
        if($isDateTime) return $dateTimeValidator->getDateTime()->getTimestamp();
        else return null;
    }

    protected function getSecondValue(Error $error)
    {
        $dateTimeValidator = new DateTimeValidator($this->value2, 'dateTime');
        $isDateTime = $dateTimeValidator->validate($error);
        if($isDateTime) return $dateTimeValidator->getDateTime()->getTimestamp();
        else return null;
    }

}