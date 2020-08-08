document.querySelector('.btn').addEventListener('click', login);

window.addEventListener("keypress", e => {
    var key = e.which || e.keyCode;
    if (key === 13) {
        login();
    }
});

function login() {
    let user = {
        username: $("#username").val(),
        password: $("#password").val()
    }

    $.ajax({
        url: 'config/kontroler.php?metoda=LOGIN',
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