<?php 
require_once dirname(__FILE__).'/../../vendor/autoload.php';
require_once dirname(__FILE__) . '/../utils/getUsuarioUnserialize.php';

class UsuarioController{
    private $dao;
    
    public function __construct(){
        $this->dao = new UsuarioDAO();
    }

    public function criar($params) {
        session_start();
        $u = new Usuario();

        $u->setNome($params['nomeCompleto']);
        $u->setSenha($params['senha']);
        $u->setEmail($params['email']);
        $u->setSaldo(0.0);
        
        try {
            $criou = $this->dao->cadastrar($u);
        } catch(Exception $e) {}

        if ($criou) {
            unset($_SESSION["error"]);

            $usuarioSerializado = serialize($u);
            
            $_SESSION["usuario"] = $usuarioSerializado;
            
            header("Location: ../../");
        } else {
            $_SESSION["error"] = "Não foi possível cadastrar o usuário."; 
            header("Location: ../../cadastroPerfil.php");
        }
    }
    public function remover($params) {
        $senhaInformada = $params["senhaAtual"];

        session_start();

        $usuario = getUsuarioUnserialize();
        $senhaUsuario = $usuario->getSenha();

        if ($senhaUsuario == $senhaInformada) {
            header("Location: ../../index.php");
            unset($_SESSION["usuario"]);
            return ($this->dao)->remover($usuario->getEmail());
        } else {
            header("Location: ../../editarPerfil.php");
            $_SESSION["error"] = "A senha informada não está correta.";
        }
    }
    public function alterar($params) {
        session_start();
        $usuario = getUsuarioUnserialize();

        if ($params["senhaAtual"] == $usuario->getSenha()){
            $usuarioAtualizado = new Usuario();

            $usuarioAtualizado->setNome($params['nomeCompleto']);
            $usuarioAtualizado->setSenha($usuario->getSenha());
            $usuarioAtualizado->setEmail($params['email']);
            $usuarioAtualizado->setSaldo($usuario->getSaldo());

            try {
                $alterou = $this->dao->alterar($usuarioAtualizado, $usuario->getEmail());
            } catch(Exception $e) {}

            if ($alterou) {
                $_SESSION["success"] = "O usuário foi alterado com sucesso";
                unset($_SESSION["error"]);

                $usuarioSerializado = serialize($usuarioAtualizado);
                
                $_SESSION["usuario"] = $usuarioSerializado;
            } else {
                $_SESSION["error"] = "Não foi possível alterar o usuário"; 
            }
        } else {
            $_SESSION["error"] = "A senha informada não está correta."; 
        }

        header("Location: ../../editarPerfil.php");
    }
    
    public function listarTodos($params) {
        return ($this->dao)->listarTodos();
    }

    public function listarPorEmail($params) {
        return ($this->dao)->listarPorEmail($params['email']);
    }
}

