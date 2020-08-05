document.querySelector("#user-delete-btn").addEventListener("click", () => {
    delete_user();
});

function delete_user() {
    $.ajax({
        url: 'config/kontroler.php?metoda=DELETE_USER',
        success: function() {
            window.location = "login.php";
        }
    })
}