<?php

use PHPUnit\Framework\TestCase;
use App\Matematicas;

class MatematicasTest extends TestCase
{
    public function testAddition()
    {
        $math = new Matematicas();
        $result = $math->add(2, 3);
        $this->assertEquals(5, $result);
    }

    public function testSubtraction()
    {
        $math = new Matematicas();
        $result = $math->subtract(5, 3);
        $this->assertEquals(2, $result);
    }
}