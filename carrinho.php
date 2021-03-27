<?php
    require_once dirname(__FILE__) . "/src/utils/handleAuth.php";

    handleAuth(true, "/");

    require_once dirname(__FILE__) . "/src/models/Usuario.php";
    require_once dirname(__FILE__) . "/src/models/Produto.php";
    require_once dirname(__FILE__) . "/src/utils/getUsuarioUnserialize.php";
    require_once dirname(__FILE__) . "/src/utils/getCarrinhoUnserialize.php";

    $usuario = getUsuarioUnserialize();
    $carrinho = getCarrinhoUnserialize();

    $qntProdutosCarrinhos = 0;

    if (!empty($carrinho)) {
        $qntProdutosCarrinhos = count($carrinho);
    }

    if($qntProdutosCarrinhos == 0) {
        header("Location: /");
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
    <link rel="stylesheet" href="/styles/pages/carrinho.css">
    <link rel="stylesheet" href="/styles/tables/carrinho.css">
    <link rel="stylesheet" href="/styles/btns/cta.css">
    <link rel="stylesheet" href="/styles/btns/ghost.css">
    <link rel="stylesheet" href="/styles/nav/nav.css">

    <!-- Aqui utilizamos apenas o elemento input__container, mas acabamos importando todas as outras (Refatorar!) -->
    <link rel="stylesheet" href="/styles/form/form.css">

    <!-- SCRIPTS -->
    <script src="/public/scripts/popupConfirmar.js" defer></script>
    <script src="/public/scripts/precosCarrinho.js" defer></script>
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
            <li class="nav__header__btn">
                <a href="/">
                    <img src="/public/home.svg" alt="Ícone da página inicial">
                    <span>Inicial</span>
                </a>
            </li>
            <?php if ($usuario) { ?>
                <li class="nav__header__btn nav__header__btn--active">
                    <a href="/carrinho.php">
                        <img src="/public/cart.svg" alt="Ícone de carrinho">
                        <span>Carrinho (<?= $qntProdutosCarrinhos ?>)</span>
                    </a>
                </li>
                <li class="nav__header__btn">
                    <a href="/editarPerfil.php">
                        <img src="/public/user.svg" alt="Ícone do perfil do usuário">
                        <span>Editar perfil</span>
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
            <h2>Seu carrinho<h2>
            <a class="ghost" href="/">
                <span>Mais produtos</span>
            </a>
        </header>
        <table class="tableCarrinho">
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($carrinho as $produto) { ?>
                <tr>
                    <td>
                        <?php 
                            $msgRemoverProduto = "Deseja realmente remover esse produto?";
                            $produtoId = $produto->getId();
                            $actionRemoverProduto = "/src/actions/carrinho.php?id=$produtoId&acao=remover"; 
                        ?>
                        <button onclick="popupConfirmar('<?= $msgRemoverProduto?>', '<?= $actionRemoverProduto ?>')">
                            <img src="/public/x.svg" alt="Remover" title="Remover"/>
                        </button>
                    </td>
                    <td><?= $produto->getNome(); ?></td>
                    <td>R$ <?= $produto->getValor(); ?></td>
                    <td>
                        <input 
                            type="number" 
                            value="1" 
                            min="1"
                        />
                    </td>
                    <td>R$ <?= $produto->getValor(); ?></td>
                </tr>
            <?php } ?>
        </table>
        <footer>
            <h3>Total a pagar: <b>R$13.0</b></h3>
            <nav>
                <a
                    href="#"
                    class="btnCTA"
                    disabled
                >
                    Comprar (Em desenvolvimento)
                </a>
                <?php 
                    $msgEsvaziar = "Deseja realmente esvaziar seu carrinho?";
                    $actionEsvaziar = "/src/actions/carrinho.php?acao=esvaziar"; 
                ?>
                <button 
                    onclick="popupConfirmar('<?= $msgEsvaziar?>', '<?= $actionEsvaziar ?>')"
                    class="ghost ghost--caution"
                >
                    Esvaziar carrinho
                </button>
            </nav>
        </footer>
    </main>
</body>
</html>