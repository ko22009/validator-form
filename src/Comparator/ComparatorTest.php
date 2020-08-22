<?php declare(strict_types=1);

namespace App\Comparator;

use App\Error;
use PHPUnit\Framework\TestCase;

class ComparatorTest extends TestCase
{

    public function testStringLengthComparator()
    {
        $string = 'home';
        $stringLengthComparator = new StringLengthComparator($string, '=', 4);
        $error = new Error();
        $stringLengthComparator->validate($error);
        $this->assertEquals(0, $error->hasErrors());
    }

    public function testStringLengthComparatorHasError() {
        $string = 'home';
        $stringLengthComparator = new StringLengthComparator($string, '>', 4);
        $error = new Error();
        $stringLengthComparator->validate($error);
        $this->assertEquals(1, $error->hasErrors());
    }

     public function testDateTimeComparatorHasError() {
        $dateTimeComparator = new DateTimeComparator('10.02.2012', '>', '10.12.2012');
        $error = new Error();
        $dateTimeComparator->validate($error);
        $this->assertEquals(1, $error->hasErrors());
    }

     public function testTimeComparator() {
        $dateTimeComparator = new DateTimeComparator('10:10', '<', '10:12');
        $error = new Error();
        $dateTimeComparator->validate($error);
        $this->assertEquals(0, $error->hasErrors());
    }

    public function testIntegerComparator() {
        $dateTimeComparator = new IntegerComparator(3, '>', 2);
        $error = new Error();
        $dateTimeComparator->validate($error);
        $this->assertEquals(0, $error->hasErrors());
    }

     public function testIntegerComparatorWithString() {
        $dateTimeComparator = new IntegerComparator('2', '<', '3');
        $error = new Error();
        $dateTimeComparator->validate($error);
        $this->assertEquals(0, $error->hasErrors());
    }

}