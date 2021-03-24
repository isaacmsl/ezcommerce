const form = document.querySelector("form")

const btnEditarPerfil = document.querySelector("#btnEditarPerfil")
const btnDeletarPerfil = document.querySelector("#btnDeletarPerfil")

btnEditarPerfil.addEventListener("click", () => {
    form.setAttribute("action", "/src/actions/usuario.php?acao=alterar")
})

btnDeletarPerfil.addEventListener("click", () => {
    form.setAttribute("action", "/src/actions/usuario.php?acao=remover")
})
