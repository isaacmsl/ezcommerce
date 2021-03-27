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
    <link rel="stylesheet" href="/styles/pages/ajuda.css">
    <link rel="stylesheet" href="/styles/cards/duvida/duvida.css">
    <link rel="stylesheet" href="/styles/nav/nav.css">

    <!-- Aqui utilizamos apenas o elemento input__container, mas acabamos importando todas as outras (Refatorar!) -->
    <link rel="stylesheet" href="/styles/form/form.css">

    <!-- SCRIPTS -->
    <script src="/public/scripts/duvidas.js" defer></script>
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
                <li class="nav__header__btn">
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
            <li class="nav__header__btn nav__header__btn--active">
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
            <h2>Dúvidas frequentes</h2>
        </header>
        <ul class="duvidaContainer">
            <li class="duvida">
                <header class="duvida__header">
                    <h3>Como anuncio meu produto?</h3>
                    <img src="/public/minus.svg" alt="Menos detalhes" title="Menos detalhes"/>
                </header>
                <main class="duvida__conteudo duvida__conteudo--expandido">
                    Clique no botão verde no canto superior direito da página inicial chamado "Adicionar". Logo após, você será redirecionado para um formulário e lá deverá preencher as informações necessárias.
                </main>
            </li>    
            <li>
                <header class="duvida__header">
                    <h3>Como busco por um produto?</h3>
                    <img src="/public/plus.svg" alt="Mais detalhes" title="Mais detalhes"/>
                </header>
                <main class="duvida__conteudo">
                    Na página inicial, encontre o campo de busca na parte superior depois clique e digite o nome do produto desejado. Vale lembrar que só serão mostrados aqueles produtos com os nomes correspondentes.
                </main>
            </li>    
            <li class="duvida">
                <header class="duvida__header">
                    <h3>Como adiciono produtos ao carrinho?</h3>
                    <img src="/public/plus.svg" alt="Mais detalhes" title="Mais detalhes"/>
                </header>
                <main class="duvida__conteudo">
                    Na página inicial, encontre o produto perfeito e clique no ícone de carrinho. Pronto! Observe que no canto superior direito da página você pode visualizar a quantidade de produtos adicionados. Também é possível visualizar essa quantidade no link "Carrinho" do menu lateral. 
                </main>
            </li>
            <li class="duvida">
                <header class="duvida__header">
                    <h3>Como removo produtos do meu carrinho?</h3>
                    <img src="/public/plus.svg" alt="Mais detalhes" title="Mais detalhes"/>
                </header>
                <main class="duvida__conteudo">
                    Primeiro clique no link "Carrinho" do menu lateral ou botão superior direito da página inicial com ícone de carrinho. Segundo, clique no ícone de "X" naquele produto que deseja remover. Caso deseje esvaziar totalmente o seu carrinho, basta clicar no botão "Esvaziar carrinho".
                </main>
            </li>
            <li class="duvida">
                <header class="duvida__header duvida__header--minimizado">
                    <h3>Como deleto meu perfil?</h3>
                    <img src="/public/plus.svg" alt="Mais detalhes" title="Mais detalhes"/>
                </header>
                <main class="duvida__conteudo">
                    Clique no botão "Editar perfil" encontrado no menu lateral da página. Quando você for redirecionado para a página de editar, informe sua senha atual e logo após clique em "Deletar meu perfil".
                </main>
            </li>  
        </ul>
    </main>
</body>
</html>