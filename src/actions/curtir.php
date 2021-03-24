<?php

require_once dirname(__FILE__).'/../../vendor/autoload.php';

$idProduto = $_REQUEST['id'];

$produtoDAO = new ProdutoDAO();

$p = $produtoDAO->listarPorId($idProduto);

$novoProduto = new Produto();

$novoProduto->setId($idProduto);
$novoProduto->setNome($p->getNome());
$novoProduto->setValor($p->getValor());
$novoProduto->setEstoque($p->getEstoque());
$novoProduto->setEmailUsuario($p->getEmailUsuario());
$novoProduto->setUrlImg($p->getUrlImg());
$novoProduto->setQntCurtidas((int)$p->getQntCurtidas()+1);

$produtoDAO->alterar($novoProduto);

header("Location: ../../");

