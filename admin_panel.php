<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>

    <link rel="stylesheet" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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

    <div id="tabela">
        <table id="users-table"></table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/return_users.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="js/close-error.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>