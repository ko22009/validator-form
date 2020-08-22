<?php declare(strict_types=1);

namespace App\Comparator;

use App\Error;
use App\Validator\DateTimeValidator;

class DateTimeComparator extends BaseComparator
{

    protected function getFirstValue(Error $error)
    {
        $dateTimeValidator = new DateTimeValidator($this->value1, 'dateTime');
        return $dateTimeValidator->validate($error) ? $dateTimeValidator->getDateTime()->getTimestamp() : null;
    }

    protected function getSecondValue(Error $error)
    {
        $dateTimeValidator = new DateTimeValidator($this->value2, 'dateTime');
        return $dateTimeValidator->validate($error) ? $dateTimeValidator->getDateTime()->getTimestamp() : null;
    }

}