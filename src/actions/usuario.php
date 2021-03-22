<?php 

require_once dirname(__FILE__).'/../controllers/UsuarioController.php';

$usuarioController = new UsuarioController();

$acao = $_REQUEST['acao'];

$metodosSuportados = ['criar', 'remover', 'alterar', 'listarTodos', 'listarPorEmail'];

if(in_array($acao, $metodosSuportados)) {
    $usuarioController->$acao($_REQUEST);
} else {
    echo 'tem nao';
}

header("Location: ../../index.php");