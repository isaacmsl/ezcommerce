<?php 
require_once dirname(__FILE__).'/../../vendor/autoload.php';
require_once dirname(__FILE__) . '/../utils/getUsuarioUnserialize.php';

class UsuarioController{
    private $dao;
    
    public function __construct(){
        $this->dao = new UsuarioDAO();
    }

    public function criar($params) {
        $u = new Usuario();

        $u->setNome($params['nomeCompleto']);
        $u->setSenha($params['senha']);
        $u->setEmail($params['email']);
        $u->setSaldo(0.0);
        
        return ($this->dao)->cadastrar($u);
    }
    public function remover($params) {
        return ($this->dao)->remover($params['email']);
    }
    public function alterar($params) {
        session_start();
        $usuario = getUsuarioUnserialize();

        if ($params["senhaAtual"] == $usuario->getSenha()){
            $usuarioAtualizado = new Usuario();

            $usuarioAtualizado->setNome($params['nomeCompleto']);
            $usuarioAtualizado->setSenha($usuario->getSenha());
            $usuarioAtualizado->setEmail($usuario->getEmail());
            $usuarioAtualizado->setSaldo($usuario->getSaldo());

            $alterou = $this->dao->alterar($usuarioAtualizado);

            if ($alterou) {
                $_SESSION["success"] = "O usuário foi alterado com sucesso";
                unset($_SESSION["error"]);

                $usuarioSerializado = serialize($usuarioAtualizado);
                
                $_SESSION["usuario"] = $usuarioSerializado;
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

