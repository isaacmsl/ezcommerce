<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezcommerce</title>
</head>
<body>
    <nav>
        <header>
            <h1>Olá, Lourenço</h1>
            <a href="/logout.php">
                <img src="/public/log-out.svg" alt="Ícone de logout">
                <span>Sair</span>
            </a>
        </header>
        <ul>
            <li>
                <img src="/public/home.svg" alt="Ícone da página inicial">
                <span>Inicial</span>
            </li>
            <li>
                <img src="/public/cart.svg" alt="Ícone de carrinho">
                <span>Carrinho</span>
            </li>
            <li>
                <img src="/public/user.svg" alt="Ícone do perfil do usuário">
                <span>Meu perfil</span>
            </li>
            <li>
                <img src="/public/help.svg" alt="Ícone de ajuda">
                <span>Ajuda</span>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div class="form__input__container">
                <img src="/public/user.svg" alt="Ícone de bússola">
                <input
                    type="type"
                    placeholder="Buscar por nome"
                ></input>
            </div>

            <a href="cadastrarProduto.php">
                <img src="/public/plus.svg" alt="Ícone de adicionar">
                <span>Adicionar</span>
            </a>
        </header>
        <ul>
            <li>
                <header>
                    <h3>Pizza</h3>
                    <div>
                        <img src="/public/heart.svg" alt="Ícone de curtidas">
                        <span>10</span>
                    </div>
                </header>
                <main>
                    <h2>R$ 100,00</h2>
                    <span>por Henrique Pizzas</span>
                </main>
            </li>
        </ul>
    </main>
</body>
</html>