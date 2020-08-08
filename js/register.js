document.querySelector('.btn').addEventListener('click', () => {
    register();
});

window.addEventListener("keypress", e => {
    var key = e.which || e.keyCode;
    if (key === 13) {
        register();
    }
});

function register() {
    let user = {
        username: $("#username").val(),
        password: $("#password").val()
    }

    $.ajax({
        url: 'config/kontroler.php?metoda=REGISTER',
        type: 'POST',
        data: user,
        success: function(data) {
            $(".rezultat").html(data);
            $(".rezultat").css("display", "block");
        }
    })
}
  