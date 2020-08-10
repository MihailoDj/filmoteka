function return_saved_movies() {
    $.ajax({
        url: 'config/kontroler.php?metoda=RETURN_SAVED_MOVIES',
        success: function(data) {
            var output='';
            var img_src;

            if (data === "[]" || data === []) {
                $("#movies-table").css("display", "none");
                $(".rezultat").html("Niste sačuvali nijedan film. Dodajte filmove na početnoj strani.");
                $(".rezultat").css("display", "block");
                return;
            }

            $.each(JSON.parse(data),function(i,red){
                fetch("https://api.themoviedb.org/3/search/movie?api_key=62fb072caa5dadc2e98f8419aafa9a50&query=" + red.name)
                    .then((result) => {
                        return result.json();
                    })
                    .then((rs) => {
                        try {
                            img_src = "https://image.tmdb.org/t/p/w185/" + rs.results[0].poster_path;
                        }
                        catch (err) {
                            img_src = "./img/question_mark.jpg";
                        }

                        output+='<div class="movie-card" style="background-image: url('+img_src+');">';
                        output+='<button type="button" class="btn" onclick="showMovie('+red.movieID+')" style="margin-top:14rem;"><i class="fas fa-info"></i></button>';
                        output+='<button type="button" class="btn" onclick="deleteMovie('+red.movieID+')"><i class="fa fa-trash"></i></button>';
                        output+='</div>';

                        document.querySelector('#movies-table').innerHTML = output;
                        $(".saved-movies-table").css("display", "block");
                    });
            });
            
        }
    })
}

return_saved_movies();

function deleteMovie(id) {
    $.ajax({
        url: 'config/kontroler.php?metoda=DELETE_SAVED_MOVIE&id=' + id,
        success: function(data) {
            return_saved_movies();
        }
    })
}

function showMovie(id) {
    $.ajax({
        url: 'config/kontroler.php?metoda=GET_MOVIE&id=' + id,
        success: function(data) {
            let movie = JSON.parse(data);

            $("#name").val(movie.name);
            $("#director").val(movie.director);
            $("#release_date").val(movie.releaseDate);
            $("#lead_actors").val(movie.leadActors);
            $("#supporting_actors").val(movie.supportingActors);
        }
    })
    modal.style.display = "block";
}


document.querySelector('.close').addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", e => {
    if (e.target == modal) {
        modal.style.display = "none";
      }
});