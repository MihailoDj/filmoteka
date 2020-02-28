document.querySelector('.btn').addEventListener('click', () =>{
    login();
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
            $("#rezultat").html(data);
            $("#rezultat").css("text-align", "center");
        }
    })
}