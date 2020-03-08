<?php
   error_reporting(E_ALL | E_STRICT);
   ini_set("display_errors", false);
   ini_set("log_errors", true);
   ini_set("error_log", "errorLogging.log");

   include 'Movie.php';
   include 'User.php';

   $conn = new Mysqli('localhost', 'root', '', 'filmoteka');

   if ($conn->connect_errno) {
        echo("Neuspesna konekcija sa bazom!");
        exit();
   }

   $conn->set_charset('utf8');
?>