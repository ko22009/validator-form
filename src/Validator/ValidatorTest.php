<?php

namespace App\Validator;

use App\Error;
use DateTime;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{

    public function stringValidatorProvider()
    {
        return [
            [0, false],
            [0.0, false],
            [null, false],
            [false, false],
            ['', true],
            ['0', true],
        ];
    }

    /**
     * @dataProvider stringValidatorProvider
     * @param mixed $value
     * @param bool $expected
     */
    public function testStringValidator($value, $expected)
    {
        $stringValidator = new StringValidator($value, 'string');
        $this->assertEquals($expected, $stringValidator->validate(new Error()));
    }

    public function DateTimeValidatorProvider()
    {
        return [
            [null, false],
            ['text', false],
            [5, false],
            [new DateTime(), false],
            ['10.13.2012 10:00', false],
            ['', true],
            ['10.02.2012', true],
            ['10.02.2012 10:00', true],
            ['10:00', true],
        ];
    }

    /**
     * @dataProvider DateTimeValidatorProvider
     * @param mixed $value
     * @param bool $expected
     */
    public function testDateTimeValidator($value, $expected)
    {
        $dateTimeValidator = new DateTimeValidator($value, 'dateTime');
        $this->assertEquals($expected, $dateTimeValidator->validate(new Error()));
    }

    public function integerValidatorProvider()
    {
        return [
            [0.0, false],
            [null, false],
            [false, false],
            ['', false],
            ['0d', false],
            ['0', true],
            [0, true],
        ];
    }

    /**
     * @dataProvider integerValidatorProvider
     * @param $value
     * @param $expected
     */
    public function testIntegerValidator($value, $expected)
    {
        $integerValidator = new IntegerValidator($value, 'int');
        $this->assertEquals($expected, $integerValidator->validate(new Error()));
    }

    public function emailValidatorProvider()
    {
        return [
            [0.0, false],
            [null, false],
            [false, false],
            ['', false],
            ['example.com', false],
            ['@example.com', false],
            ['abc@example', false],
            ['abc@example.com', true],
        ];
    }

    /**
     * @dataProvider emailValidatorProvider
     * @param $value
     * @param $expected
     */
    public function testEmailValidator($value, $expected)
    {
        $integerValidator = new EmailValidator($value, 'email');
        $this->assertEquals($expected, $integerValidator->validate(new Error()));
    }

}