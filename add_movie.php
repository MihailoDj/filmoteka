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

    <div class="form-wrapper">
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
            <div class="btn-wrapper">
                <input type="button" class="btn" value="Dodaj">
            </div>
            
        </form>
    </div>
    <div class="rezultat"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/add_movie.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>