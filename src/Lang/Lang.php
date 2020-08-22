<?php declare(strict_types=1);

namespace App\Lang;

class Lang
{

    private array $lang;

    public function __construct(array $lang = null)
    {
        if (is_null($lang)) $this->lang = include('_lang.php');
        else $this->lang = $lang;
    }

    public function get(string $name, array $values = [])
    {
        if (array_key_exists($name, $this->lang)) $string = $this->lang[$name];
        else return '';

        foreach ($values as $key => $value) {
            $pattern = '/\$' . $key . '/';
            $string = preg_replace($pattern, $value, $string);
        }

        return $string;
    }

}