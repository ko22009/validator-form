<?php

namespace App\Comparator;

use App\Comparator\Operations\EqualOperation;
use App\Comparator\Operations\LessEqualOperation;
use App\Comparator\Operations\LessOperation;
use App\Comparator\Operations\MoreEqualOperation;
use App\Comparator\Operations\MoreOperation;
use App\Comparator\Operations\Operation;
use App\Error;
use App\Lang\Lang;

abstract class BaseComparator implements Comparator
{

    protected $comparator;
    protected $value1;
    protected $value2;
    private $lang;

    public function __construct($value1, $comparator, $value2)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->comparator = $comparator;
        $this->lang = new Lang();
    }

    protected function getFirstValue(Error $error)
    {
        return $this->value1;
    }

    protected function getSecondValue(Error $error)
    {
        return $this->value2;
    }

    private function availableComparators()
    {
        return [
            '>' => MoreOperation::class,
            '<' => LessOperation::class,
            '=' => EqualOperation::class,
            '>=' => MoreEqualOperation::class,
            '<=' => LessEqualOperation::class
        ];
    }

    public function validate(Error $error)
    {
        $value1 = $this->getFirstValue($error);
        $value2 = $this->getSecondValue($error);
        if(is_null($value1) || is_null($value2)) return false;

        $comparators = $this->availableComparators();
        $index = array_search($this->comparator, array_keys($comparators));
        if($index === false) {
            $error->add($this->lang->get('NO_CORRECT_COMPARATOR'));
            return false;
        }
        /**
         * @var Operation $operation
         */
        $class = $comparators[$this->comparator];
        $operation = new $class($value1, $value2);
        return $operation->validate($error);
    }

}