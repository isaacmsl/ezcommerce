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
    <link rel="stylesheet" href="/styles/btns/ghost.css">
    <link rel="stylesheet" href="/styles/nav/nav.css">

    <!-- Aqui utilizamos apenas o elemento input__container, mas acabamos importando todas as outras (Refatorar!) -->
    <link rel="stylesheet" href="/styles/form/form.css">

    <!-- SCRIPTS -->
    <script src="/public/scripts/popupConfirmar.js" defer></script>
    <script src="/public/scripts/buscarProduto.js" defer></script>
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
                        <span>Carrinho (0)</span>
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
            <div class="form__input__container">
                <img src="/public/search.svg" alt="Ícone de buscar produto por nome">
                <input
                    type="type"
                    placeholder="Buscar por nome"
                ></input>
            </div>

            <div id="grupoBtnInicial">
                <?php if ($usuario) { ?>
                    <a class="btnCTA" href="cadastroProduto.php">
                        <img src="/public/plus.svg" alt="Ícone de adicionar">
                        <span>Adicionar</span>
                    </a>
                    <a class="ghost" href="carrinho.php">
                        <span>0</span>
                        <img src="/public/cart-green.svg" alt="Carrinho">
                    </a>
                <?php } else { ?>
                    <a class="btnCTA" href="login.php">
                        <img src="/public/log-in.svg" alt="Ícone de adicionar">
                        <span>Fazer login</span>
                    </a>
                    <a class="ghost" href="cadastroPerfil.php">
                        <span>Cadastrar perfil</span>
                    </a>
                <?php } ?>
            </div>
        </header>
        <ul>
            <?php 
            foreach($produtos as $produto) { 
                $id = $produto->getId(); 
                $nome = $produto->getNome();   
                $emailUsuario = $produto->getEmailUsuario(); 
                $urlImg = $produto->getUrlImg();
                $valor = $produto->getValor();
                $qntCurtidas = $produto->getQntCurtidas();
                $qntEstoque = $produto->getEstoque();

                $nomes = explode(" ", $produto->getNomeUsuario());
                $nomeUsuario = $nomes[count($nomes) - 1]; 
            ?>
                <li class="cardProduto" title="<?= $nome; ?>">
                    <img 
                        class="cardProduto__imagem"
                        src="<?= $urlImg; ?>" 
                        alt="Imagem do produto <?= $nome; ?>"
                    >
                    <main class="cardProduto__conteudo">
                        <header class="cardProduto__conteudo__header">
                            <h3><?= $nome; ?></h3>
                            <?php 
                                $donoProduto = $usuario && $emailUsuario == $usuario->getEmail();
                                if($donoProduto) {
                            ?>
                                <nav class="cardProduto__conteudo__btns">
                                    <a href="/editarProduto.php?id=<?= $id ?>">
                                        <img src="/public/edit.svg" alt="Ícone de editar produto">
                                    </a>
                                    <?php 
                                        $msgRemoverProduto = "Deseja realmente remover esse produto?";
                                        $actionRemoverProduto = "/src/actions/produto.php?acao=remover&id=$id"; 
                                    ?>
                                    <button onclick="popupConfirmar('<?= $msgRemoverProduto?>', '<?= $actionRemoverProduto ?>')">
                                        <img src="/public/trash.svg" alt="Ícone de remover produto">
                                    </button>
                                </nav>
                            <?php } else { ?>
                                <nav class="cardProduto__conteudo__btns">
                                    <a href="#">
                                        <img src="/public/cart-green.svg" alt="Adicionar ao carrinho">
                                    </a>
                                    <a 
                                        class="cardProduto__conteudo__curtidas__icone"
                                        href="/src/actions/curtir.php?id=<?= $id ?>"
                                    >
                                        <img src="/public/heart.svg" alt="Ícone de curtidas">
                                        <span><?= $qntCurtidas ?></span>
                                    </a>
                                </nav>
                            <?php } ?>
                        </header>
                        <div class="cardProduto__conteudo__info">
                            <h2>R$ <?= $valor; ?></h2>
                            <?php if ($donoProduto) { $nomeUsuario = "você"; } ?>
                            <?php 
                            if ($qntEstoque == 0) { 
                            ?>
                                <span>Sem estoque</span>
                            <?php 
                            } else {
                                $textoEstoque = ($qntEstoque > 1)? "disponíveis":"disponível";
                            ?>
                                <span><?= $qntEstoque; ?> <?= $textoEstoque?></span>
                            <?php 
                            } 
                            ?>
                            <?php if ($donoProduto) { ?>
                                <span>Seu produto</span>
                            <?php } else { ?>
                                <span>Por: <?= $nomeUsuario; ?></span>
                            <?php } ?>
                        <div>
                    </main>
                </li>
            <?php } ?>
        </ul>
    </main>
</body>
</html>