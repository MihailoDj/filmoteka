function get_user() {
    $.ajax({
        url: 'config/kontroler.php?metoda=GET_USER',
        success: function(data) {
            let user = JSON.parse(data);

            $("#username").val(user.username);
            $("#password").val(user.password);
        }
    })
}

get_user();