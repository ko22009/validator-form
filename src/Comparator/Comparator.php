<?php

namespace App\Comparator;

use App\Error;

interface Comparator
{

    public function validate(Error $error);

}