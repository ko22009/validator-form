<?php declare(strict_types=1);

namespace App\Comparator\Operations;

use App\Error;
use App\Lang\Lang;

abstract class Operation
{

    protected $value1;
    protected $value2;
    protected $oldValue1;
    protected $oldValue2;
    protected Lang $lang;
    protected string $name1;
    protected string $name2;

    /**
     * Operation constructor.
     * @param string|int $value1
     * @param string|int $value2
     * @param Lang $lang
     * @param string|int $oldValue1
     * @param string|int $oldValue2
     * @param string $name1
     * @param string $name2
     */
    public function __construct($value1, $value2, Lang $lang, $oldValue1, $oldValue2, $name1, $name2)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->oldValue1 = $oldValue1;
        $this->oldValue2 = $oldValue2;
        $this->lang = $lang;
        $this->name1 = $name1;
        $this->name2 = $name2;
    }

    abstract public function validate(Error $error);

}