<?php

namespace App;

use PHPUnit\Framework\TestCase;

class TicketFormTest extends TestCase
{

    public function dataProvider()
    {
        return [
            [
                'email'          => 'admin@mail.ru',
                'firstName'      => 'Admin',
                'lastName'       => 'Admin',
                'date'           => '10.02.2012',
                'time'           => '10:50',
                'namePlace'      => 'White House',
                'row'            => 5,
                'column'         => 2,
                'expectedErrors' => 0
            ],
            [
                'email'          => 'admin@mail.ru',
                'firstName'      => 'a',
                'lastName'       => 'Admin',
                'date'           => '10.02.2012',
                'time'           => '10:50',
                'namePlace'      => 'White House',
                'row'            => 5,
                'column'         => 2,
                'expectedErrors' => 1
            ],
            [
                'email'          => 'admin@mail.ru',
                'firstName'      => 'Admin',
                'lastName'       => 'Admin',
                'date'           => '10.02.2012',
                'time'           => '10:50',
                'namePlace'      => 'Wh',
                'row'            => 0,
                'column'         => 0,
                'expectedErrors' => 3
            ],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param $email
     * @param $firstName
     * @param $lastName
     * @param $date
     * @param $time
     * @param $namePlace
     * @param $row
     * @param $column
     * @param $expectedErrors
     */
    public function testCorrectData($email, $firstName, $lastName, $date, $time, $namePlace, $row, $column, $expectedErrors)
    {
        $ticketForm = new TicketForm($email, $firstName, $lastName, $date, $time, $namePlace, $row, $column);
        $ticketForm->validate();
        $this->assertEquals($expectedErrors, $ticketForm->hasErrors());
    }

}