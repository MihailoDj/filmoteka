document.querySelector('.btn').addEventListener('click', () => {
    addUser();
});

function addUser() {
    let user = {
        username: $("#username").val(),
        password: $("#password").val()
    }

    $.ajax({
        url: 'config/kontroler.php?metoda=ADD_USER',
        type: 'POST',
        data: user,
        success: function(data) {
            $("#rezultat").html(data);
            $("#rezultat").css("text-align", "center");
        }
    })
}
  