<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>

    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <div class="navbar">
        <a href="login.php">Izloguj se</a>
        <a href="settings.php">Podesavanja naloga</a>
        <a href="add_movie.php">Dodaj film</a>
        <a href="view_movies.php">Pregled filmova</a>
        <a href="admin_panel.php">Pocetna</a>
    </div>

    <div class="login-box">
        <h1>Dodaj film</h1>
        <form action="">
            <div class="textbox">
                <input type="text" name="name" id="name" placeholder="Naziv filma" autofocus>
            </div>
            <div class="textbox">
                <input type="text" name="director" id="director" placeholder="Reziser">
            </div>
            <div class="textbox">
                <input type="number" name="release_date" id="release_date" placeholder="Godina izdanja">
            </div>
            <div class="textbox">
                <input type="text" name="lead_actors" id="lead_actors" placeholder="Glavne uloge">
            </div>
            <div class="textbox">
                <input type="text" name="supporting_actors" id="supporting_actors" placeholder="Sporedne uloge">
            </div>
            <input type="button" class="btn" value="Dodaj">
        </form>
    </div>
    <div class="rezultat"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/add_movie.js"></script>
</body>
</html>