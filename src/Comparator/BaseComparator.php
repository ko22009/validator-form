<?php

namespace App\Comparator;

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

    private function availableComparator()
    {
        return [
            '>',
            '<',
            '=',
            '>=',
            '<='
        ];
    }

    protected function checkComparator() {
        return in_array($this->comparator, $this->availableComparator());
    }

    public function validate(Error $error)
    {
        $correctComparator = $this->checkComparator();
        if(!$correctComparator) $error->add($this->lang->get('NO_CORRECT_COMPARATOR'));
        $result = false;
        $value1 = $this->getFirstValue($error);
        $value2 = $this->getSecondValue($error);
        if(is_null($value1) || is_null($value2)) return false;
        switch ($this->comparator) {
            case '>':
                if(!($value1 > $value2)) {
                    $error->add($this->lang->get('NO_MORE', [$this->value1, $this->value2]));
                } else $result = true;
                break;
            case '<':
                if(!($value1 < $value2)) {
                    $error->add($this->lang->get('NO_LESS', [$this->value1, $this->value2]));
                } else $result = true;
                break;
            case '=':
                if(!($value1 == $value2)) {
                    $error->add($this->lang->get('NO_EQUAL', [$this->value1, $this->value2]));
                } else $result = true;
                break;
            case '>=':
                if(!($value1 >= $value2)) {
                    $error->add($this->lang->get('NO_MORE_EQUAL', [$this->value1, $this->value2]));
                } else $result = true;
                break;
            case '<=':
                if(!($value1 <= $value2)) {
                    $error->add($this->lang->get('NO_LESS_EQUAL', [$this->value1, $this->value2]));
                } else $result = true;
                break;
        }
        return $result;
    }

}