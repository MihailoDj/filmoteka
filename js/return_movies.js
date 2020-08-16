fillMoviesTable();

function fillMoviesTable() {
    $.ajax({
        url: 'config/kontroler.php?metoda=RETURN_MOVIES',
        success: function(data) {
            var output='';
            var img_src;

            if (data === "[]" || data === []) {
                $("#movies-table").css("display", "none");
                $(".rezultat").html("U bazi ne postoji nijedan film.");
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

                            if (rs.results[0].poster_path === null) {
                                img_src = "./img/question_mark.jpg";
                            }
                        }
                        catch (err) {
                            img_src = "./img/question_mark.jpg";
                        }

                        output+='<div class="movie-card" style="background-image: url('+img_src+');">';
                        output+='<button type="button" class="btn" onclick="showMovie('+red.movieID+')" style="margin-top:14rem;"><i class="fas fa-info"></i></button>';
                        output+='<button type="button" class="btn" onclick="deleteMovie('+red.movieID+')"><i class="fa fa-trash"></i></button>';
                        output+='</div>';

                        document.querySelector('#movies-table').innerHTML = output;
                        $("#movies-table").css("display", "block");
                    });
            });
            
        }
    })
}

function deleteMovie(id) {
    $.ajax({
        url: 'config/kontroler.php?metoda=DELETE_MOVIE&id=' + id,
        success: function(data) {
            $(".rezultat").css("position", "relative");
            $(".rezultat").css("background-color", "#b4f59a");
            $(".rezultat").css("border-color", "green");
            $(".rezultat").html(data);
            $(".rezultat").css("bottom", "1rem");
            $(".rezultat").css("display", "block");

            fillMoviesTable();
        }
    })
}

let globalID = null;

function showMovie(id) {
    globalID = id;

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

document.querySelector('#btn-update').addEventListener("click", updateMovie);

function updateMovie () {
    let m = {
        movieID: globalID,
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
        success: function(data) {
            if (data.toString().includes(" ")) {
                alert(data);
            } else {
                modal.style.display="none";
            }
            
        }
    })
}

window.addEventListener("keypress", e => {
    var key = e.which || e.keyCode;
    if (key === 13) {
        updateMovie();
    }
});

document.querySelector('.close').addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", e => {
    if (e.target == modal) {
        modal.style.display = "none";
      }
});