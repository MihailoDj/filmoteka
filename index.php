<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocetna</title>

    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <?php
        include 'navbar_user.php';
    ?>

    <div class="form-wrapper">
        <h1>Pronadji film</h1>
        <form action="">
            <div class="textbox">
                <i class="fas fa-search"></i>
                <input type="search" name="search" id="search" placeholder="Ime filma, rezisera. . ." autofocus>
            </div>
            <div class="btn-wrapper">
                <input type="button" class="btn" value="Pretrazi">
            </div>
        </form>
    </div>

    <div id="movies-table" class="search-movies-table" style="display:none;"></div>

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

    <button class="btn-back-to-top"><i class="fas fa-arrow-up fa-2x"></i></button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/search_movies.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>