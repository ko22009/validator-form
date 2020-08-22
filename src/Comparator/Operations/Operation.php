<?php declare(strict_types=1);

namespace App\Comparator\Operations;

use App\Error;
use App\Lang\Lang;

abstract class Operation
{

    protected $value1;
    protected $value2;
    protected Lang $lang;

    public function __construct($value1, $value2, Lang $lang)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->lang = $lang;
    }

    abstract public function validate(Error $error);

}