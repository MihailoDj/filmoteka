document.querySelector('.btn').addEventListener('click', () => {
    register();
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
  