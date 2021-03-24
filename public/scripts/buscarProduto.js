const produtosView = document.querySelectorAll("body > main > ul > li")

const inputBuscar = document.querySelector("body > main > header > div.form__input__container > input")

inputBuscar.addEventListener("keyup", () => {
    const buscaStr = inputBuscar.value.trim()

    const buscaRegex = new RegExp(buscaStr, 'i')

    
    if (buscaStr == "" || !buscaStr) {
        produtosView.forEach(produto => produto.classList.remove("cardProduto--hidden"))
        return
    }

    produtosView.forEach(produto => {
        const nome = produto.querySelector("h3").textContent
        if (!buscaRegex.test(nome)) {
            produto.classList.add("cardProduto--hidden")
        } else {
            produto.classList.remove("cardProduto--hidden")

        }
    })
    
})