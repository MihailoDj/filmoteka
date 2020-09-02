<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel - pregled filmova</title>

    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <?php
        include 'navbar_admin.php';

        session_start();

        if (!isset($_SESSION["username"]) || $_SESSION["username"] == null || $_SESSION["username"] == "" || $_SESSION["username"] != "admin@filmoteka.com") {
            header("Location: index.php");
            die();
        }
    ?>

    <div id="movies-table"></div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <br>
            <div class="">
                <h1>Izmeni podatke o filmu</h1>
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
                        <input type="button" id="btn-update" class="btn" value="Izmeni">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <div class="rezultat"></div>
    <button class="btn-back-to-top"><i class="fas fa-arrow-up fa-2x"></i></button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/return_movies.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/back_to_top.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/close-error.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>