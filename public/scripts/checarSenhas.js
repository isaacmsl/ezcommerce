const senhas = document.querySelectorAll("div.form__input__container > input[type='password']")

const spanError = newSpanError()

const primeiraSenha = senhas[0]
const segundaSenha = senhas[1] 

/**
 * Verifica se as senhas coincidem, se não mostra o erro para o usuário.
 */
segundaSenha.addEventListener("keyup", () => {
    const valorPrimeira = primeiraSenha.value
    const valorSegunda = segundaSenha.value

    const valoresDiferentes = valorPrimeira !== valorSegunda

    const paiPrimeiraSenha = primeiraSenha.parentElement
    const paiSegundaSenha = segundaSenha.parentElement
    const avoSegundaSenha = paiSegundaSenha.parentElement

    if (valoresDiferentes && valorSegunda.length > 0) {
        paiPrimeiraSenha.classList.add("form__input__container--error")
        paiSegundaSenha.classList.add("form__input__container--error")
        avoSegundaSenha.appendChild(spanError)
    } else {
        paiPrimeiraSenha.classList.remove("form__input__container--error")
        paiSegundaSenha.classList.remove("form__input__container--error")
        avoSegundaSenha.removeChild(spanError)
    }
})

function newSpanError() {
    const spanError = document.createElement("span")
    spanError.innerText = "As senhas não coincidem."
    return spanError
}