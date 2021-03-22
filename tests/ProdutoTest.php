<?php


use PHPUnit\Framework\TestCase as PHPUnit;

class ProdutoTest extends PHPUnit {
    
    //Testando o nome do usuario
    public function testNome() {
        $p = new Produto();
        $p->setNome("Rapadura");

        $this->assertEquals("Rapadura", $p->getNome());
    }
    
    //Testando a senha do usuario
    public function testValor() {
        $p = new Produto();
        $p->setSenha(30.4);
        
        $this->assertEquals(30.4, $p->getValor());
    }
    
    //Testando o email do Usuario
    public function testEstoque() {
        $p = new Produto();
        $p->setEstoque(5);
        
        $this->assertEquals(5, $p->getEstoque());
    }
    
    //Testando o saldo do Usuario
    public function testQntCurtidas() {
        $p = new Produto();
        $p->setQntCurtidas(100);
        
        $this->assertEquals(100, $p->getQntCurtidas());
    }
}