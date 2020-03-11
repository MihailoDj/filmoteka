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

    <div id="movies-table"></div>
    <h3 id="rezultatBrisanja"></h3>
    <button class="btn-back-to-top"><i class="fas fa-arrow-up fa-2x"></i></button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/return_movies.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="js/back_to_top.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>