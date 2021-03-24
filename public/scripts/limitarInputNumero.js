const inputs = document.querySelectorAll("div.form__input__container > input[type='number']")

const valorProdutoInput = inputs[0]
const quantEstoqueInput = inputs[1]

valorProdutoInput.addEventListener("keyup", () => {

    if(valorProdutoInput.value == ""){
        valorProdutoInput.value = ""
    }
    
    const inputValor = Number(valorProdutoInput.value)
    
    if(inputValor < 0){
        valorProdutoInput.value = ""
    }
})

quantEstoqueInput.addEventListener("keyup", () => {
    if(quantEstoqueInput.value == ""){
        quantEstoqueInput.value = ""
    }
    
    const inputValor = Number(quantEstoqueInput.value)
    
    if(inputValor < 0){
        quantEstoqueInput.value = ""
    }
})