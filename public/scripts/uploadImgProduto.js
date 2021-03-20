const imgProduto = document.querySelector("#inputImg")
const textoLabel = document.querySelector("#inputImg + label > span")

imgProduto.addEventListener("change", () => {
    const fileName = imgProduto.value.split(/(\\|\/)/g).pop()
    textoLabel.innerText = `Anexou ${fileName}`
    textoLabel.classList.add("form__input__image--anexada")
})