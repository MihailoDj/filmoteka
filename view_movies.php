<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>

    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <?php
        include 'navbar_admin.php';
    ?>

    <div id="movies-table" class="form-wrapper"></div>
    <h3 id="rezultatBrisanja"></h3>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
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
                    $("rezultatBrisanja").html(data);
                    fillMoviesTable();
                }
            })
        }
    </script>
</body>
</html>