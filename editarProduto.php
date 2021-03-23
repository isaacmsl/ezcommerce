<?php
    require_once dirname(__FILE__) . "/src/utils/handleAuth.php";
    require_once dirname(__FILE__) . "/src/controllers/ProdutoController.php";
    handleAuth(true, "login.php");

    $produtoArray = (new ProdutoController())->listarPorId($_REQUEST);

    // o back é uma vergonha!
    $produto = new Produto();

    $produto->setId($produtoArray["id"]);
    $produto->setNome($produtoArray["nome"]);
    $produto->setValor($produtoArray["valor"]);
    $produto->setEstoque($produtoArray["estoque"]);
    $produto->setUrlImg($produtoArray["urlImg"]);
    $produto->setQntCurtidas($produtoArray["qntCurtidas"]);
    $produto->setEmailUsuario($produtoArray["emailUsuario"]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezcommerce - Editar produto</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="/styles/form/form.css">

    <!-- SCRIPTS -->
    <script src="/public/scripts/limitarInputNumero.js" defer></script>
    <script src="/public/scripts/uploadImgProduto.js" defer></script>
    
</head>
<body class="form__background__image">
    <main class="form__background">
        <form
            action="/src/actions/produto.php?acao=alterar&id=<?= $produto->getId(); ?>"
            method="POST" 
            class="form"
            enctype="multipart/form-data"
        >
            <header class="form__header">
                <img src="/public/logo-ez-gray.svg" alt="Logo da loja">
                <label>Ezcommerce</label>
            </header>
            <h1 class="form__title">Editar produto</h1>
            <div class="form__group">
                <div class="form__input__container">
                    <img src="/public/box.svg" alt="Ícone de produto">
                    <input 
                        name="nomeProduto"
                        type="type"
                        value="<?= $produto->getNome(); ?>"
                        placeholder="Produto" 
                        required
                    ></input>
                </div>
                <div class="form__input__container">
                    <img src="/public/dollar.svg" alt="Ícone de preço">
                    <input 
                        name="preco"
                        type="number"
                        min=0
                        value="<?= $produto->getValor(); ?>"
                        step="any"
                        placeholder="Preço" 
                        required
                    ></input>
                </div>
                <div class="form__input__container">
                    <img src="/public/archive.svg" alt="Ícone de estoque">
                    <input 
                        name="estoque"
                        type="number"
                        min=1
                        value="<?= $produto->getEstoque(); ?>"
                        placeholder="Quantidade em estoque" 
                        required
                    ></input>
                </div>
                <div class="form__input__img">
                    <input 
                        name="imgProduto"
                        type="file"
                        id="inputImg"
                        hidden
                    ></input>
                    <label for="inputImg">
                        <img src="/public/image.svg" alt="Ícone de imgProduto">
                        <span>Imagem do produto</span>
                    </label>
                </div>
            </div>
            <div class="form__group">
                <button
                    class="form__btn__submit"
                    type="submit"
                >
                    Editar!
                </button>
                <a 
                    class="form__link__ghost"
                    href="/"
                >
                    Cancelar
                </a>
            <div>
        </form>
    </main>
</body>
</html>