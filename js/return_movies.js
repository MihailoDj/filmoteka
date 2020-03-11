function fillMoviesTable() {
    $.ajax({
        url: 'config/kontroler.php?metoda=RETURN_MOVIES',
        success: function(data) {
            var output='';
            var img_src;
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
                        output+='<button type="button" class="btn" onclick="showMovie('+red.movieID+')" style="margin-top:12rem;"><i class="fas fa-info"></i></button>';
                        output+='<button type="button" class="btn" onclick="deleteMovie('+red.movieID+')"><i class="fa fa-trash"></i></button>';
                        output+='</div>';

                        document.querySelector('#movies-table').innerHTML = output;
                    });
            });
            
        }
    })
}

fillMoviesTable();

function deleteMovie(id) {
    $.ajax({
        url: 'config/kontroler.php?metoda=DELETE_MOVIE&id=' + id,
        success: function(data) {
            fillMoviesTable();
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

            document.querySelector('#btn-update').addEventListener("click", e => {
                let m = {
                    movieID: movie.movieID,
                    name: $("#name").val(),
                    director: $("#director").val(),
                    release_date: $("#release_date").val(),
                    lead_actors: $("#lead_actors").val(),
                    supporting_actors: $("#supporting_actors").val()
                }

                $.ajax({
                    url: 'config/kontroler.php?metoda=UPDATE_MOVIE',
                    type: 'POST',
                    data: m,
                    success: function() {
                        modal.style.display="none";
                    }
                })
            });
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