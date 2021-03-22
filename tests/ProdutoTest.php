<?php


use PHPUnit\Framework\TestCase as PHPUnit;

class ProdutoTest extends PHPUnit {
    
    //Testando o nome do usuario
    public function testNome() {
        $p = new Produto();
        $p->setNome("Rapadura");

        $this->assertEquals("Rapadura", $p->getNome());
    }

    //Testando o id do usuario
    public function testId() {
        $p = new Produto();
        $p->setId(3);

        $this->assertEquals(3, $p->getId());
    }
    
    //Testando a senha do usuario
    public function testValor() {
        $p = new Produto();
        $p->setValor(30.4);
        
        $this->assertEquals(30.4, $p->getValor());
    }
    
    //Testando o email do Usuario
    public function testEmailUsuario() {
        $p = new Produto();
        $p->setEmailUsuario("a@a");
        
        $this->assertEquals("a@a", $p->getEmailUsuario());
    }

    //Testando o estoque do Usuario
    public function testEstoque() {
        $p = new Produto();
        $p->setEstoque(5);
        
        $this->assertEquals(5, $p->getEstoque());
    }
    
    //Testando a quantidade de curtidas do Usuario
    public function testQntCurtidas() {
        $p = new Produto();
        $p->setQntCurtidas(100);
        
        $this->assertEquals(100, $p->getQntCurtidas());
    }
    /*
    public function testUrlImg() {
        $p = new Produto();
        $p->setUrlImg("Isaac cagando");
        
        $this->assertEquals("Isaac cagando", $p->getUrlImg());
    }
    */
}