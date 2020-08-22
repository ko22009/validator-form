<?php

namespace App\Validator;

use App\Error;
use App\Lang\Lang;

abstract class BaseValidator
{

    private $value;
    private $name;
    protected $lang;

    public function __construct($value, $name)
    {
        $this->value = $value;
        $this->name = $name;
        $this->lang = new Lang();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    abstract public function validate(Error $error): bool;

}