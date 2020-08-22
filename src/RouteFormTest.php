<?php declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

class RouteFormTest extends TestCase
{

    public function dataProvider()
    {
        return [
            [
                'departureDateTime' => '10.02.2014',
                'arrivalDateTime'   => '11.02.2014',
                'departurePlace'    => 'Chelyabinsk',
                'arrivalPlace'      => 'Moscow',
                'expectedErrors'    => 0
            ],
            [
                'departureDateTime' => '11.02.2014',
                'arrivalDateTime'   => '11.02.2014',
                'departurePlace'    => '',
                'arrivalPlace'      => 'Moscow',
                'expectedErrors'    => 2
            ],
            [
                'departureDateTime' => '',
                'arrivalDateTime'   => '',
                'departurePlace'    => '',
                'arrivalPlace'      => 'Moscow',
                'expectedErrors'    => 2
            ],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param $departureDateTime
     * @param $arrivalDateTime
     * @param $departurePlace
     * @param $arrivalPlace
     * @param $expectedErrors
     */
    public function testCorrectData($departureDateTime, $arrivalDateTime, $departurePlace, $arrivalPlace, $expectedErrors)
    {
        $routeForm = new RouteForm($departureDateTime, $arrivalDateTime, $departurePlace, $arrivalPlace);
        $routeForm->validate();
        $this->assertEquals($expectedErrors, $routeForm->hasErrors());
    }

}