<?php

use PHPUnit\Framework\TestCase as PHPUnit;

class UsuarioTest extends PHPUnit {
    
    //Testando o nome do usuario
    public function testNome() {
        $u = new Usuario();
        $u->setNome("Paulo");

        $this->assertEquals("Paulo", $u->getNome());
    }
    
    //Testando a senha do usuario
    public function testSenha() {
        $u = new Usuario();
        $u->setSenha("123");
        
        $this->assertEquals("123", $u->getSenha());
    }
    
    //Testando o email do Usuario
    public function testEmail() {
        $u = new Usuario();
        $u->setEmail("vitorlimaborges@gmail.com");
        
        $this->assertEquals("vitorlimaborges@gmail.com", $u->getEmail());
    }
    
    //Testando o saldo do Usuario
    public function testSaldo() {
        $u = new Usuario();
        $u->setSaldo(10000.0);
        
        $this->assertEquals(10000.0, $u->getSaldo());
    }
}