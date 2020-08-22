<?php declare(strict_types=1);

namespace App;

use App\Comparator\DateTimeComparator;
use App\Comparator\StringLengthComparator;

class RouteForm extends BaseForm
{

    private $departureDateTime;
    private $arrivalDateTime;
    private $departurePlace;
    private $arrivalPlace;

    public function __construct($departureDateTime, $arrivalDateTime, $departurePlace, $arrivalPlace)
    {
        parent::__construct();
        $this->departureDateTime = $departureDateTime;
        $this->arrivalDateTime = $arrivalDateTime;
        $this->departurePlace = $departurePlace;
        $this->arrivalPlace = $arrivalPlace;
    }

    public function validate()
    {
        $dateTimeComparator = new DateTimeComparator($this->departureDateTime, '<', $this->arrivalDateTime);
        $dateTimeComparator->validate($this->error);

        $stringLengthComparator = new StringLengthComparator($this->departurePlace, '>', 1);
        $stringLengthComparator->validate($this->error);

        $stringLengthComparator = new StringLengthComparator($this->arrivalPlace, '>', 1);
        $stringLengthComparator->validate($this->error);
    }

}