const btnMostrarSenhas = document.querySelectorAll(".btnMostrarSenhas")

btnMostrarSenhas.forEach(btn => {
    btn.addEventListener("click", () => {
        const pai = btn.parentElement
        const avo = pai.parentElement
        
        const inputs = avo.querySelectorAll("input")

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