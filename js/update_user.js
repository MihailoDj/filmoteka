document.querySelector(".btn").addEventListener("click", () => {
    update_user();
});

window.addEventListener("keypress", e => {
    var key = e.which || e.keyCode;
    if (key === 13) {
        update_user();
    }
});

function update_user() {
    let user = {
        username: $("#username").val(),
        password: $("#password").val()
    }
    $.ajax({
        url: 'config/kontroler.php?metoda=UPDATE_USER',
        type: 'POST',
        data: user,
        success: function() {
            
        }
    })
}