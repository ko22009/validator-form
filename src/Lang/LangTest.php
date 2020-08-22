<?php declare(strict_types=1);

namespace App\Lang;

use PHPUnit\Framework\TestCase;

class LangTest extends TestCase
{

    public function testWithOutVariables()
    {
        $lang = new Lang([
            'EMPTY' => 'String is empty',
        ]);
        $output = $lang->get('EMPTY');
        $this->assertEquals('String is empty', $output);
    }

    public function testEmptyWhenNoExistLangVariable()
    {
        $lang = new Lang([]);
        $output = $lang->get('EMPTY');
        $this->assertEquals('', $output);
    }

    public function testVariables()
    {
        $lang = new Lang([
            'NO_MORE' => '$0 no more $1',
        ]);
        $output = $lang->get('NO_MORE', [1, 2]);
        $this->assertEquals('1 no more 2', $output);
    }

    public function testNamedVariable()
    {
        $lang = new Lang([
            'NO_CORRECT_COMPARATOR' => 'No correct comparator $comparator',
        ]);
        $output = $lang->get('NO_CORRECT_COMPARATOR', ['comparator' => '!']);
        $this->assertEquals('No correct comparator !', $output);
    }

}