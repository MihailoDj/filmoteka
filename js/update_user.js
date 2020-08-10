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
        success: function(data) {
            if (data.toString().includes("uspešno")) {
                $(".rezultat").css("background-color", "#b4f59a");
                $(".rezultat").css("border-color", "green");
            } else {
                $(".rezultat").css("background-color", "rgb(247, 150, 171)");
                $(".rezultat").css("border-color", "red");
            }

            $(".rezultat").html(data);
            $(".rezultat").css("display", "block");
            
        }
    })
}