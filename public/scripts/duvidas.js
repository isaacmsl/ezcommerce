const cabecalhos = document.querySelectorAll('.duvida__header')
const icons = document.querySelectorAll('.duvida__header img')
const conteudos = document.querySelectorAll('.duvida__conteudo')

for(let i = 0; i < cabecalhos.length; i++) {
    cabecalhos[i].addEventListener('click', () => {
        // expandir conteudo
        if (conteudos[i].className === "duvida__conteudo") {
            if (i == cabecalhos.length - 1) {
                cabecalhos[i].className = "duvida__header"
            }

            conteudos[i].className = 'duvida__conteudo duvida__conteudo--expandido'
            icons[i].src = '/public/minus.svg'
            return
        } 

        if (i == cabecalhos.length - 1) {
            cabecalhos[i].className = "duvida__header duvida__header--minimizado"
        }
        conteudos[i].className = 'duvida__conteudo'
        icons[i].src = '/public/plus.svg'
    })
}