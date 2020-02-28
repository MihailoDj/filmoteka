<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmoteka - registracija</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-box">
        <h1>Registruj se</h1>
        <form action="" method="POST">
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Korisnicko ime">
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Lozinka">
            </div>

            <input type="button" class="btn" value="Potvrdi">
        </form>
        <div id="rezultat"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/register.js"></script>
</body>
</html>