const produtosQnts = document.querySelectorAll(".tableCarrinho td > input[type='number']")
const valorTotalHtml = document.querySelector("footer > h3 > b")

somaValorTotal()

produtosQnts.forEach(produtoQnt => {
    const avo = produtoQnt.parentElement.parentElement
    const subtotal = avo.querySelector("td:last-child")
    const valorIniStr = subtotal.textContent.split(" ")[1]
    const valorIniNum = Number(valorIniStr)

    produtoQnt.addEventListener("input", () => {
        const valorStr = subtotal.textContent.split(" ")[1]
        const valorNum = Number(valorStr)

        if(isNaN(valorNum) || valorNum < valorIniNum) {
            subtotal.textContent = "R$ " + valorIniNum
            somaValorTotal()
        } else {
            const qnt = produtoQnt.value

            if (qnt >= 1) {
                subtotal.textContent = "R$ " + qnt * valorIniNum
                somaValorTotal()
            } else {
                produtoQnt.value = 1
                subtotal.textContent = "R$ " + valorIniNum
                somaValorTotal()
            }
        }
    })
})

function somaValorTotal() {
    const precosProdutos = [];

    produtosQnts.forEach(produtoQnt => {
        const avo = produtoQnt.parentElement.parentElement
        const subtotal = avo.querySelector("td:last-child")
        const valorIniStr = subtotal.textContent.split(" ")[1]
        const valorProduto = Number(valorIniStr)

        precosProdutos.push(valorProduto)
    })

    const reducer = (sum, val) => sum + val;
    const valorTotal = precosProdutos.reduce(reducer, 0);
    valorTotalHtml.textContent = "R$ " + valorTotal
}