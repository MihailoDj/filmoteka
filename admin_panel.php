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

    <div id="tabela" class="form-wrapper"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/return_users.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>