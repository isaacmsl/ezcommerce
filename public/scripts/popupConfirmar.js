function popupConfirmar(msg, action) {
    if (confirm(msg)) {
        window.location.href = action
    }
}

const formPopup = document.querySelector('form');
formPopup.addEventListener('submit', event => {
    event.preventDefault()

    const action = formPopup.getAttribute("action")
    
    if (action.includes("remover")) {
        if(confirm("Deseja realmente deletar?")) {
            formPopup.submit();
        }
    } else if (action.includes("alterar")) {
        if(confirm("Deseja realmente alterar?")) {
            formPopup.submit();
        }
    }
})