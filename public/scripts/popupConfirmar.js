function popupConfirmar(msg, action) {
    if (confirm(msg)) {
        window.location.href = action
    }
}