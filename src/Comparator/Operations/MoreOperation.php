<?php declare(strict_types=1);

namespace App\Comparator\Operations;

use App\Error;

class MoreOperation extends Operation
{

    public function validate(Error $error)
    {
        if (!($this->value1 > $this->value2)) {
            $error->add($this->lang->get('NO_MORE', [$this->name1, $this->oldValue1, $this->name2, $this->oldValue2]));
            return false;
        }
        return true;
    }

}