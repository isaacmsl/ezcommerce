const inputs = document.querySelectorAll("div.form__input__container > input[type='number']")

const valorProdutoInput = inputs[0]
const quantEstoqueInput = inputs[1]

valorProdutoInput.addEventListener("keyup", () => {
    const inputValor = Number(valorProdutoInput.value)

    if(inputValor < 0){
        valorProdutoInput.value = ""
    }else if(inputValor == 0){
        valorProdutoInput.value = "0"
    }
})

quantEstoqueInput.addEventListener("keyup", () => {
    const inputValor = Number(quantEstoqueInput.value)
    
    if(inputValor <= 0 || isNaN(inputValor)){
        quantEstoqueInput.value = ""
    }
})