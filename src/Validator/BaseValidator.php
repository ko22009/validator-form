<?php declare(strict_types=1);

namespace App\Validator;

use App\Error;
use App\Lang\Lang;

abstract class BaseValidator
{

    private $value;
    private string $name;
    protected Lang $lang;

    /**
     * BaseValidator constructor.
     * @param string|int $value
     * @param string $name
     */
    public function __construct($value, string $name)
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