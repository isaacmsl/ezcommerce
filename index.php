<?php
    require_once dirname(__FILE__) . "/src/models/Usuario.php";
    require_once dirname(__FILE__) . "/src/utils/getUsuarioUnserialize.php";
    require_once dirname(__FILE__) . "/src/controllers/ProdutoController.php";

    $usuario = getUsuarioUnserialize();
    $produtos = (new ProdutoController())->listarTodos();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezcommerce</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="/styles/cards/produto/produto.css">
    <link rel="stylesheet" href="/styles/pages/inicial.css">
    <link rel="stylesheet" href="/styles/btns/cta.css">
    <link rel="stylesheet" href="/styles/nav/nav.css">

    <!-- Aqui utilizamos apenas o elemento input__container, mas acabamos importando todas as outras (Refatorar!) -->
    <link rel="stylesheet" href="/styles/form/form.css">
</head>
<body>
    <nav class="nav">
        <header class="nav__header">
            <?php if ($usuario) { ?>
                <?php
                    $nomeCompleto = $usuario->getNome();
                    $nomes = explode(" ", $nomeCompleto);
                    $sobrenome = $nomes[count($nomes) - 1];
                ?>
                <h1>Olá, <?= $sobrenome ?> </h1>
                <a 
                    class="nav__header__sair"
                    href="/src/actions/logout.php"
                >
                    <img src="/public/log-out.svg" width="24px" alt="Ícone de logout">
                    <span>Sair</span>
                </a>
            <?php } else { ?>
                <h1>Ezcommerce</h1>
                <span>Achei fácil comprar</span>
            <?php } ?>
        </header>
        <ul class="nav__header__btns">
            <li class="nav__header__btn nav__header__btn--active">
                <a href="/">
                    <img src="/public/home.svg" alt="Ícone da página inicial">
                    <span>Inicial</span>
                </a>
            </li>
            <?php if ($usuario) { ?>
                <li class="nav__header__btn">
                    <a href="/carrinho.php">
                        <img src="/public/cart.svg" alt="Ícone de carrinho">
                        <span>Carrinho</span>
                    </a>
                </li>
                <li class="nav__header__btn">
                    <a href="/perfil.php">
                        <img src="/public/user.svg" alt="Ícone do perfil do usuário">
                        <span>Meu perfil</span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav__header__btn">
                <a href="/ajuda.php">
                    <img src="/public/help.svg" alt="Ícone de ajuda">
                    <span>Ajuda</span>
                </a>
            </li>
        </ul>
        <footer class="nav__bottom__logo">  
            <img src="/public/logo-ez-dark.svg" alt="Logo da Ezcommerce">
        </footer>
    </nav>
    <main>
        <header>
            <div class="form__input__container">
                <img src="/public/search.svg" alt="Ícone de buscar produto por nome">
                <input
                    type="type"
                    placeholder="Buscar por nome"
                ></input>
            </div>

            <?php if ($usuario) { ?>
                <a class="btnCTA" href="cadastroProduto.php">
                    <img src="/public/plus.svg" alt="Ícone de adicionar">
                    <span>Adicionar</span>
                </a>
            <?php } else { ?>
                <a class="btnCTA" href="login.php">
                    <img src="/public/log-in.svg" alt="Ícone de adicionar">
                    <span>Fazer login</span>
                </a>
            <?php } ?>
        </header>
        <ul>
            <?php 
            foreach($produtos as $produto) { 
                $id = $produto->getId(); 
                $nome = $produto->getNome();    
                $urlImg = $produto->getUrlImg();
                $valor = $produto->getValor();
                $qntCurtidas = $produto->getQntCurtidas();
                
                $nomes = explode(" ", $produto->getNomeUsuario());
                $nomeUsuario = $nomes[count($nomes) - 1]; 
            ?>
                <li class="cardProduto">
                    <img 
                        class="cardProduto__imagem"
                        src="<?= $urlImg; ?>" 
                        alt="Imagem do produto <?= $nome; ?>"
                    >
                    <main class="cardProduto__conteudo">
                        <header class="cardProduto__conteudo__header">
                            <h3><?= $nome; ?></h3>
                            <div class="cardProduto__conteudo__curtidas">
                                <span><?= $qntCurtidas ?></span>
                                <a 
                                    class="cardProduto__conteudo__curtidas__icone"
                                    href="src/actions/curtir.php?id=<?=$id; ?>"
                                >
                                    <img src="/public/heart.svg" alt="Ícone de curtidas">
                                </a>
                            </div>
                        </header>
                        <div class="cardProduto__conteudo__info">
                            <h2>R$ <?= $valor; ?></h2>
                            <span>por <?= $nomeUsuario; ?></span>
                        <div>
                    </main>
                </li>
            <?php } ?>
        </ul>
    </main>
</body>
</html>