<?php

use PHPUnit\Framework\TestCase as PHPUnit;

class ExemploTest extends PHPUnit {
    public function testSoma() {
        $resultado = 9.0 / 3;
        
        $this->assertEquals(3, $resultado);
    }
}