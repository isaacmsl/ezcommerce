<?php 

require_once dirname(__FILE__).'/../controllers/ProdutoController.php';

$produtoController = new ProdutoController();

$acao = $_REQUEST['acao'];

$_REQUEST['imgProduto'] = $_FILES['imgProduto'];

$metodosSuportados = ['criar', 'remover', 'alterar', 'listarTodos', 'listarPorId'];

if(in_array($acao, $metodosSuportados)) {
    $produtoController->$acao($_REQUEST);
} else {
    echo 'tem nao';
}
