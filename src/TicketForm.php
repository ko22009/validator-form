<?php declare(strict_types=1);

namespace App;

use App\Comparator\IntegerComparator;
use App\Comparator\StringLengthComparator;
use App\Validator\DateTimeValidator;
use App\Validator\EmailValidator;

class TicketForm extends BaseForm
{

    private string $email;
    private string $firstName;
    private string $lastName;
    private string $date;
    private string $time;
    private string $namePlace;
    private $row;
    private $column;

    /**
     * TicketForm constructor.
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $date
     * @param string $time
     * @param string $namePlace
     * @param string|int $row
     * @param string|int $column
     */
    public function __construct(string $email, string $firstName, string $lastName, string $date, string $time, string $namePlace, $row, $column)
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

        $strLenComparator = new StringLengthComparator('firstName', $this->firstName, '>=', 2, 'len');
        $strLenComparator->validate($this->error);

        $strLenComparator = new StringLengthComparator('lastName', $this->lastName, '>=', 2, 'len');
        $strLenComparator->validate($this->error);

        $dateTimeValidator = new DateTimeValidator($this->date, 'date');
        $dateTimeValidator->validate($this->error);

        $dateTimeValidator = new DateTimeValidator($this->time, 'time');
        $dateTimeValidator->validate($this->error);

        $strLenComparator = new StringLengthComparator('namePlace', $this->namePlace, '>', 5, 'len');
        $strLenComparator->validate($this->error);

        $intComparator = new IntegerComparator('row', $this->row, '>', 0, 'int');
        $intComparator->validate($this->error);

        $intComparator = new IntegerComparator('column', $this->column, '>', 0, 'int');
        $intComparator->validate($this->error);
    }

}