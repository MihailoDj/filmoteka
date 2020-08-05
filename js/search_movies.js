document.querySelector(".btn").addEventListener("click", () => {
    search_movies();
});

window.addEventListener("keypress", e => {
    var key = e.which || e.keyCode;
    if (key === 13) {
        e.preventDefault();
        search_movies();
    }
});

function search_movies() {
    
    let search = $("#search").val();
    console.log(search);
    $.ajax({
        url: 'config/kontroler.php?metoda=SEARCH_MOVIES&search=' + search,
        success: function(data) {
            var output='<h2 style="text-align:center;">Rezultati pretrage:</h2>';
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
                        output+='<button type="button" class="btn" onclick="showMovie('+red.movieID+')" style="margin-top:14rem;"><i class="fas fa-info"></i></button>';
                        output+='<button type="button" class="btn" onclick="addMovie('+red.movieID+')"><i class="fas fa-plus"></i></button>';
                        output+='</div>';

                        document.querySelector('#movies-table').innerHTML = output;
                        document.querySelector('#movies-table').style.display = "block";
                        document.querySelector('#movies-table').style.marginTop = "32rem";
                        
                    });
            });
            
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

function addMovie(id) {

}