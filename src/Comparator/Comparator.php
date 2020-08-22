<?php declare(strict_types=1);

namespace App\Comparator;

use App\Error;

interface Comparator
{

    public function validate(Error $error);

}