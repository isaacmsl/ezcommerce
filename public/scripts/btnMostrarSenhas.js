const btnMostrarSenhas = document.querySelector("#btnMostrarSenhas")
const inputsPasswords = document.querySelectorAll("div.form__input__container > input[type='password']")

btnMostrarSenhas.addEventListener("click", () => {
    // fazer toggle do tipo password para text
    inputsPasswords.forEach(input => {
        const tipoAtual = input.getAttribute("type")

        if (tipoAtual === "password") {
            input.setAttribute("type", "text")
            btnMostrarSenhas.src = "/public/eye.svg"
        } else {
            input.setAttribute("type", "password")
            btnMostrarSenhas.src = "/public/eye-off.svg"
        }
    })
})