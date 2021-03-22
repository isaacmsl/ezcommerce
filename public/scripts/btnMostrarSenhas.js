const btnMostrarSenhas = document.querySelectorAll(".btnMostrarSenhas")

btnMostrarSenhas.forEach(btn => {
    const pai = btn.parentElement
    const avo = pai.parentElement
    const inputs = avo.querySelectorAll("input[type='password']")

    btn.addEventListener("click", () => {
        inputs.forEach(input => {
            const tipoAtual = input.getAttribute("type")

            if (tipoAtual === "password") {
                input.setAttribute("type", "text")
                btn.src = "/public/eye.svg"
            } else {
                input.setAttribute("type", "password")
                btn.src = "/public/eye-off.svg"
            }
        })
    })
})