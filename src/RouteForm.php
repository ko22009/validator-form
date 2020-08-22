<?php declare(strict_types=1);

namespace App;

use App\Comparator\DateTimeComparator;
use App\Comparator\StringLengthComparator;

class RouteForm extends BaseForm
{

    private string $departureDateTime;
    private string $arrivalDateTime;
    private string $departurePlace;
    private string $arrivalPlace;

    public function __construct(string $departureDateTime, string $arrivalDateTime, string $departurePlace, string $arrivalPlace)
    {
        parent::__construct();
        $this->departureDateTime = $departureDateTime;
        $this->arrivalDateTime = $arrivalDateTime;
        $this->departurePlace = $departurePlace;
        $this->arrivalPlace = $arrivalPlace;
    }

    public function validate()
    {
        $dateTimeComparator = new DateTimeComparator('departureDateTime', $this->departureDateTime, '<', $this->arrivalDateTime, 'arrivalDateTime');
        $dateTimeComparator->validate($this->error);

        $stringLengthComparator = new StringLengthComparator('departurePlace', $this->departurePlace, '>', 1, 'len');
        $stringLengthComparator->validate($this->error);

        $stringLengthComparator = new StringLengthComparator('arrivalPlace', $this->arrivalPlace, '>', 1, 'len');
        $stringLengthComparator->validate($this->error);
    }

}