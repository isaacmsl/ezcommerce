<?php
    require_once dirname(__FILE__) . "/src/models/Usuario.php";
    session_start();
    $usuario = $_SESSION["usuario"];
    
    if (isset($usuario)) {
        $usuario = unserialize($usuario);
    } else {
        $usuario = false;
    }
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
                <a class="btnCTA" href="cadastrarProduto.php">
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
            <li class="cardProduto">
                <img 
                    class="cardProduto__imagem"
                    src="/public/pizza-napolitana.jpg" 
                    alt="Imagem do produto"
                >
                <main class="cardProduto__conteudo">
                    <header class="cardProduto__conteudo__header">
                        <h3>Pizza</h3>
                        <div class="cardProduto__conteudo__curtidas">
                            <span>10</span>
                            <img src="/public/heart.svg" alt="Ícone de curtidas">
                        </div>
                    </header>
                    <div class="cardProduto__conteudo__info">
                        <h2>R$ 100,00</h2>
                        <span>por Henrique Pizzas</span>
                    <div>
                </main>
            </li>
            <li class="cardProduto">
                <img 
                    class="cardProduto__imagem"
                    src="/public/pizza-napolitana.jpg" 
                    alt="Imagem do produto"
                >
                <main class="cardProduto__conteudo">
                    <header class="cardProduto__conteudo__header">
                        <h3>Pizza</h3>
                        <div class="cardProduto__conteudo__curtidas">
                            <span>10</span>
                            <img src="/public/heart.svg" alt="Ícone de curtidas">
                        </div>
                    </header>
                    <div class="cardProduto__conteudo__info">
                        <h2>R$ 100,00</h2>
                        <span>por Henrique Pizzas</span>
                    <div>
                </main>
            </li>
            <li class="cardProduto">
                <img 
                    class="cardProduto__imagem"
                    src="/public/pizza-napolitana.jpg" 
                    alt="Imagem do produto"
                >
                <main class="cardProduto__conteudo">
                    <header class="cardProduto__conteudo__header">
                        <h3>Pizza</h3>
                        <div class="cardProduto__conteudo__curtidas">
                            <span>10</span>
                            <img src="/public/heart.svg" alt="Ícone de curtidas">
                        </div>
                    </header>
                    <div class="cardProduto__conteudo__info">
                        <h2>R$ 100,00</h2>
                        <span>por Henrique Pizzas</span>
                    <div>
                </main>
            </li>
            <li class="cardProduto">
                <img 
                    class="cardProduto__imagem"
                    src="/public/pizza-napolitana.jpg" 
                    alt="Imagem do produto"
                >
                <main class="cardProduto__conteudo">
                    <header class="cardProduto__conteudo__header">
                        <h3>Pizza</h3>
                        <div class="cardProduto__conteudo__curtidas">
                            <span>10</span>
                            <img src="/public/heart.svg" alt="Ícone de curtidas">
                        </div>
                    </header>
                    <div class="cardProduto__conteudo__info">
                        <h2>R$ 100,00</h2>
                        <span>por Henrique Pizzas</span>
                    <div>
                </main>
            </li>
            <li class="cardProduto">
                <img 
                    class="cardProduto__imagem"
                    src="/public/pizza-napolitana.jpg" 
                    alt="Imagem do produto"
                >
                <main class="cardProduto__conteudo">
                    <header class="cardProduto__conteudo__header">
                        <h3>Pizza</h3>
                        <div class="cardProduto__conteudo__curtidas">
                            <span>10</span>
                            <img src="/public/heart.svg" alt="Ícone de curtidas">
                        </div>
                    </header>
                    <div class="cardProduto__conteudo__info">
                        <h2>R$ 100,00</h2>
                        <span>por Henrique Pizzas</span>
                    <div>
                </main>
            </li>
            <li class="cardProduto">
                <img 
                    class="cardProduto__imagem"
                    src="/public/pizza-napolitana.jpg" 
                    alt="Imagem do produto"
                >
                <main class="cardProduto__conteudo">
                    <header class="cardProduto__conteudo__header">
                        <h3>Pizza</h3>
                        <div class="cardProduto__conteudo__curtidas">
                            <span>10</span>
                            <img src="/public/heart.svg" alt="Ícone de curtidas">
                        </div>
                    </header>
                    <div class="cardProduto__conteudo__info">
                        <h2>R$ 100,00</h2>
                        <span>por Henrique Pizzas</span>
                    <div>
                </main>
            </li>
        </ul>
    </main>
</body>
</html>