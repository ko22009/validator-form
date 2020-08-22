<?php

namespace App;

class Error
{

    private $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function add($error) {
        $this->errors[] = $error;
    }

    public function get() {
        return implode(PHP_EOL, $this->errors);
    }

    public function hasErrors() {
        return count($this->errors);
    }

}