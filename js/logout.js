document.querySelector('#logout').addEventListener("click", () => {
    logout();
});

function logout() {
    $.ajax({
        url: 'config/kontroler?metoda=LOG_OUT',
        success: function() {

        }
    })
}