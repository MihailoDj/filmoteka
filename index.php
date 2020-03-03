<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocetna</title>

    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<body>
    <div class="navbar">
        <a href="login.php">Izloguj se</a>
        <a href="settings.php">Podesavanja naloga</a>
    </div>

    <div class="login-box">
        <h1>Pronadji film</h1>
        <form action="">
            <div class="textbox">
                <i class="fas fa-search"></i>
                <input type="search" name="search" id="search" placeholder="Ime filma, autora. . ." autofocus>
            </div>
            <input type="button" class="btn" value="Pretrazi">
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>