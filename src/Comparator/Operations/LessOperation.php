<?php declare(strict_types=1);

namespace App\Comparator\Operations;

use App\Error;

class LessOperation extends Operation
{

    public function validate(Error $error)
    {
        if (!($this->value1 < $this->value2)) {
            $error->add($this->lang->get('NO_LESS', [$this->value1, $this->value2]));
            return false;
        }
        return true;
    }

}