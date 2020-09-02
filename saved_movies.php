<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmoteka - Moji filmovi</title>

    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <?php
        include 'navbar_user.php';

        session_start();

        if (!isset($_SESSION["username"]) || $_SESSION["username"] == null || $_SESSION["username"] == "") {
            header("Location: index.php");
            die();
        }
    ?>

    <div id="movies-table" class="saved-movies-table"></div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <br>
            <div class="" style="text-align: left;">
                <form action="">
                    <div class="textbox">
                        <p>Naziv filma:</p>
                        <input type="text" name="name" id="name" placeholder="Naziv filma" readonly autofocus>
                    </div>
                    <div class="textbox">
                        <p>Reziser:</p>
                        <input type="text" name="director" id="director" placeholder="Reziser" readonly>
                    </div>
                    <div class="textbox">
                        <p>Godina izdanja:</p>
                        <input type="number" name="release_date" id="release_date" placeholder="Godina izdanja" readonly>
                    </div>
                    <div class="textbox">
                        <p>Glavne uloge:</p>
                        <input type="text" name="lead_actors" id="lead_actors" placeholder="Glavne uloge" readonly>
                    </div>
                    <div class="textbox">
                        <p>Sporedne uloge:</p>
                        <input type="text" name="supporting_actors" id="supporting_actors" placeholder="Sporedne uloge" readonly>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <div class="rezultat"></div>
    <button class="btn-back-to-top"><i class="fas fa-arrow-up fa-2x"></i></button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/return_saved_movies.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/back_to_top.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/close-error.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>