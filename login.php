<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmoteka - login</title>
    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <div class="form-wrapper">
        <h1>Uloguj se</h1>
        <form action="" method="">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Korisnicko ime" autofocus>
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Lozinka">
            </div>
            <div class="btn-wrapper">
                <input type="button" class="btn" value="Potvrdi">
            </div>
        </form>
        <div class="registerLink">
            <a href="register.php">Registruj se</a>
        </div>
        <div id="rezultat"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>