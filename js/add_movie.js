document.querySelector('.btn').addEventListener('click', () => {
    add_movie();
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
            $("#rezultat").html(data);
            $("#rezultat").css("text-align", "center");
        }
    })
}