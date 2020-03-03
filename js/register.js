document.querySelector('.btn').addEventListener('click', () => {
    register();
});

document.querySelector('.btn').addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
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
            $("#rezultat").html(data);
            $("#rezultat").css("text-align", "center");
        }
    })
}
  