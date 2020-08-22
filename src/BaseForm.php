<?php declare(strict_types=1);

namespace App;

abstract class BaseForm
{

    protected Error $error;

    public function __construct()
    {
        $this->error = new Error();
    }

    abstract public function validate();

    public function getErrors() {
        return $this->error->get();
    }

    public function hasErrors() {
        return $this->error->hasErrors();
    }

}