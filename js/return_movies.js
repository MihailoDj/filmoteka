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
                        img_src = rs.results[0].poster_path;
                        //obradi slucaj kad je img_src undefined

                        output+='<div class="movie-card" style="background-image: url(\'https://image.tmdb.org/t/p/w185/'+img_src+'\');">';
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
            $("#rezultatBrisanja").html(data);
            fillMoviesTable();
        }
    })
}