document.querySelector('.btn').addEventListener('click', () => {
    add_movie();
});

window.addEventListener("keypress", e => {
    var key = e.which || e.keyCode;
    if (key === 13) {
        add_movie();
    }
});


function add_movie() {
    let movie = {
        name: $("#name").val(),
        director: $("#director").val(),
        release_date: $("#release_date").val(),
        lead_actors: $("#lead_actors").val(),
        supporting_actors: $("#supporting_actors").val()
    }

    $.ajax({
        url: 'config/kontroler.php?metoda=ADD_MOVIE',
        type: 'POST',
        data: movie,
        success: function(data) {
            
            if (!data.toString().includes("Film uspešno sačuvan.")) {
                $(".rezultat").html(data);
                $(".rezultat").css("background-color", "rgb(247, 150, 171)");
                $(".rezultat").css("border-color", "red");
                $(".rezultat").css("bottom", "1rem");
                $(".rezultat").css("display", "block");
            } else {
                $("#name").val('');
                $("#director").val('');
                $("#release_date").val('');
                $("#lead_actors").val('');
                $("#supporting_actors").val('');

                $(".rezultat").css("background-color", "#b4f59a");
                $(".rezultat").css("border-color", "green");
                $(".rezultat").css("bottom", "1rem");
                $(".rezultat").html(data);
                $(".rezultat").css("display", "block");
            }
        }
    })
}