<?php declare(strict_types=1);

namespace App\Validator;

use App\Error;
use DateTime;
use Exception;

class DateTimeValidator extends BaseValidator
{

    private ?DateTime $dateTime;

    public function __construct($value, $name)
    {
        parent::__construct($value, $name);
        $this->dateTime = null;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTime(): ?DateTime
    {
        return $this->dateTime;
    }

    public function validate(Error $error): bool
    {
        $value = $this->getValue();
        $name = $this->getName();

        $stringValidator = new StringValidator($value, $name);
        if (!$stringValidator->validate($error)) return false;

        try {
            $this->dateTime = new DateTime($value);
        } catch (Exception $exception) {
            $error->add($this->lang->get('NO_DATE_TIME') . '. ' . $this->lang->get('VAR', [
                    $name,
                    $value
                ]));
            return false;
        }

        return true;
    }

}