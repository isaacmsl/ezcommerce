<?php

require_once dirname(__FILE__).'/../src/models/persistencia/UsuarioDAO.php';
require_once dirname(__FILE__).'/../src/models/Usuario.php';

use PHPUnit\Framework\TestCase as PHPUnit;

class UsuarioDAOTest extends PHPUnit {
    //Testando cadastrar Usuario no banco
    public function testCadastrar() {
        $u = new Usuario();
        $u->setEmail("usuario@gmail.com");
        $u->setNome("Usuario");
        $u->setSenha("123");
        $u->setSaldo(90.0);
        
        $dao = new UsuarioDAO(true);

        $this->assertEquals(1, $dao->cadastrar($u));
    }
    
    //Testando alterar Usuario no banco
    public function testAlterar() {
        $u = new Usuario();
        $u->setEmail("usuario@gmail.com");
        $u->setNome("Usuario Legal");
        $u->setSenha("12332");
        $u->setSaldo(9123120.0);
        
        $dao = new UsuarioDAO(true);

        $this->assertEquals(1, $dao->alterar($u));
    }
        
    //Testando listar Usuario no banco
    public function testListarTodos() {
        $dao = new UsuarioDAO(true);
        
        $usuarios = Array(
            0 => Array(
                    "nome" => "Usuario Legal",
                    "email" => "usuario@gmail.com",
                    "senha" => "12332",
                    "saldo" => 9123120.0,
                )
            );

        $this->assertEquals($usuarios, $dao->listarTodos());
    }
    
    //Testando Remover Usuario no banco
    public function testRemover() {    
        $dao = new UsuarioDAO(true);

        $this->assertEquals(1, $dao->remover("usuario@gmail.com"));
    }
}