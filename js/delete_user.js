document.querySelector("#user-delete-btn").addEventListener("click", () => {
    delete_user();
});

function delete_user() {
    if (confirm("Da li ste sigurni? Nećete moći da povratite nalog.")) {
        $.ajax({
            url: 'config/kontroler.php?metoda=DELETE_USER',
            success: function() {
                window.location = "index.php";
            }
        })
    }
}