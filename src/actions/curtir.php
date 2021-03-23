<?php

require_once dirname(__FILE__).'/../../vendor/autoload.php';

$idProduto = $_REQUEST['id'];

$produtoDAO = new ProdutoDAO();

$p = $produtoDAO->listarPorId($idProduto);

$novoProduto = new Produto();

$novoProduto->setId($idProduto);
$novoProduto->setNome($p['nome']);
$novoProduto->setValor($p['valor']);
$novoProduto->setEstoque($p['estoque']);
$novoProduto->setEmailUsuario($p['emailUsuario']);
$novoProduto->setUrlImg($p['urlImg']);
$novoProduto->setQntCurtidas((int)$p['qntCurtidas']+1);

$produtoDAO->alterar($novoProduto);

header("Location: ../../");

