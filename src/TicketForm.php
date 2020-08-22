<?php

namespace App;

use App\Comparator\IntegerComparator;
use App\Comparator\StringLengthComparator;
use App\Validator\DateTimeValidator;
use App\Validator\EmailValidator;

class TicketForm extends BaseForm
{

    private $email;
    private $firstName;
    private $lastName;
    private $date;
    private $time;
    private $namePlace;
    private $row;
    private $column;

    public function __construct($email, $firstName, $lastName, $date, $time, $namePlace, $row, $column)
    {
        parent::__construct();
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->date = $date;
        $this->time = $time;
        $this->namePlace = $namePlace;
        $this->row = $row;
        $this->column = $column;
    }

    public function validate()
    {
        $strLenComparator = new EmailValidator($this->email, 'email');
        $strLenComparator->validate($this->error);

        $strLenComparator = new StringLengthComparator($this->firstName, '>=', 2);
        $strLenComparator->validate($this->error);

        $strLenComparator = new StringLengthComparator($this->lastName, '>=', 2);
        $strLenComparator->validate($this->error);

        $dateTimeValidator = new DateTimeValidator($this->date, 'date');
        $dateTimeValidator->validate($this->error);

        $dateTimeValidator = new DateTimeValidator($this->time, 'time');
        $dateTimeValidator->validate($this->error);

        $strLenComparator = new StringLengthComparator($this->namePlace, '>', 5);
        $strLenComparator->validate($this->error);

        $intComparator = new IntegerComparator($this->row, '>', 0);
        $intComparator->validate($this->error);

        $intComparator = new IntegerComparator($this->column, '>', 0);
        $intComparator->validate($this->error);
    }

}