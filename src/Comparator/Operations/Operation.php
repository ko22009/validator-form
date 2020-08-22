<?php

namespace App\Comparator\Operations;

use App\Error;
use App\Lang\Lang;

abstract class Operation
{

    protected $value1;
    protected $value2;
    protected $lang;

    public function __construct($value1, $value2)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->lang = new Lang();
    }

    abstract public function validate(Error $error);

}