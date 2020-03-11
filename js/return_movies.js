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

                        output+='<div class="movie-card" onclick="showMovie('+red.movieID+')" style="background-image: url('+img_src+');">';
                        output += '<button type="button" class="btn" onclick="deleteMovie('+ red.movieID + ')"><i class="fa fa-trash"></i></button>';
                        output += '</div>';

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
            let red = JSON.parse(data);

            $("#name").val(red.name);
            $("#director").val(red.director);
            $("#release_date").val(red.releaseDate);
            $("#lead_actors").val(red.leadActors);
            $("#supporting_actors").val(red.supportingActors);
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