<?php

namespace App\Comparator\Operations;

use App\Error;

class LessEqualOperation extends Operation
{

    public function validate(Error $error)
    {
        if (!($this->value1 <= $this->value2)) {
            $error->add($this->lang->get('NO_LESS_EQUAL', [$this->value1, $this->value2]));
            return false;
        }
        return true;
    }

}