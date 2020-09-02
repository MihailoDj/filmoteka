<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmoteka - prijava</title>
    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <?php
        session_start();
        $_SESSION = array();
        session_destroy();
    ?>
    <div class="form-wrapper">
        <h1>Prijavi se</h1>
        <form action="" method="">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Korisničko ime" autofocus>
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Lozinka">
            </div>
            <div class="btn-wrapper">
                <input type="button" class="btn" value="Potvrdi">
            </div>
        </form>
        <div class="link-div">
            <a href="register.php">Registruj se</a>
        </div>
    </div>

    <div class="rezultat"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/login.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/close-error.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>