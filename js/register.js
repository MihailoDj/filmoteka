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
            if (data.toString().includes("script")) {
                $(".rezultat").html(data);
                $(".rezultat").css("display", "none");
            } else {
                $(".rezultat").html(data);
                $(".rezultat").css("display", "block");
            }
        }
    })
}
  