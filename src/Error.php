<?php declare(strict_types=1);

namespace App;

class Error
{

    private array $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function add($error)
    {
        $this->errors[] = $error;
    }

    public function get()
    {
        return implode(PHP_EOL, $this->errors);
    }

    public function hasErrors()
    {
        return count($this->errors);
    }

}