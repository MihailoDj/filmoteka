<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podesavanja naloga</title>

    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <?php
        include 'navbar_user.php';

        session_start();
    ?>

    <div class="form-wrapper">
        <h1>Izmeni podatke</h1>
        <form action="">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Korisnicko ime" autofocus>
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Lozinka">
            </div>
            <div class="btn-wrapper">
                <input type="button" class="btn" value="Izmeni">
            </div>
        </form>
        <div class="link-div">
            <a href="#" id="user-delete-btn">Deaktiviraj nalog</a>
        </div>
    </div>
    <div class="rezultat"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/get_user.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/update_user.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/delete_user.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>