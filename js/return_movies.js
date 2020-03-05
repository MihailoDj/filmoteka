function fillMoviesTable() {
    $.ajax({
        url: 'config/kontroler.php?metoda=RETURN_MOVIES',
        success: function(data) {
            var output ='<table class="table"><thead><tr><th>Film</th><th>Reziser</th><th>Godina izdanja</th><th>Brisanje</th></tr></thead><tbody>';
            $.each(JSON.parse(data),function(i,red){
                output+='<tr>';
                output += '<td>'+ red.name + '</td>';
                output += '<td>'+ red.director + '</td>';
                output += '<td>'+ red.releaseDate + '</td>';
                output += '<td><button type="button" class="btn btn-danger" onclick="deleteMovie('+ red.movieID + ')"><i class="fa fa-trash"></i></button></td>';
                output += '</tr>';
            });
            output+='</tbody></table>';
            $("#movies-table").html(output);
        }
    })
}

fillMoviesTable();

function deleteMovie(id) {
    $.ajax({
        url: 'config/kontroler.php?metoda=DELETE_MOVIE&id=' + id,
        success: function(data) {
            $("rezultatBrisanja").html(data);
            fillMoviesTable();
        }
    })
}