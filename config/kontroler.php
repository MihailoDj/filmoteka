<?php
    include 'init.php';

    if (!isset($_GET['metoda']) && !isset($_POST['metoda'])) {
        die("Greska!");
    }

    $operacija = isset($_GET['metoda']) ? $_GET['metoda'] : $_POST['metoda'];

    if ($operacija == 'REGISTER') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE username='{$username}'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO users VALUES(DEFAULT, '{$username}', '{$hashed_password}', 2);";

            if ($conn->query($sql)) {
                echo('<script type="text/javascript">location.href = \'login.php\';</script>');
            } else {
                echo("Neuspesna registracija.");
            }
        } else {
            echo("Korisniko ime je zauzeto!");
        }
    }

    if ($operacija == "LOGIN") {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $sql = "SELECT * FROM users WHERE username='{$username}'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            echo("Pogresno korisnicko ime");
        } else {
            if (password_verify($password, $result->fetch_object()->password)) {
                if ($username == "admin@filmoteka.com") {
                    echo('<script type="text/javascript">location.href = \'admin_panel.php\';</script>');
                } else {
                    echo('<script type="text/javascript">location.href = \'index.php\';</script>');
                }
            } else {
                echo("Pogresna lozinka.");
            }
        }
    }

    if ($operacija == "ADD_MOVIE") {
        $name = trim($_POST["name"]);
        $director = trim($_POST["director"]);
        $release_date = trim($_POST["release_date"]);
        $lead_actors = trim($_POST["lead_actors"]);
        $supporting_actors = trim($_POST["supporting_actors"]);

        $sql = "INSERT INTO movies VALUES(DEFAULT, '{$name}', '{$director}', {$release_date}, '{$lead_actors}', '{$supporting_actors}');";
        $conn->query($sql);
    }

    if ($operacija == "RETURN_MOVIES") {
        $sql = "SELECT movieID, name, director, releaseDate FROM movies";

        $result_set = $conn -> query($sql);
        $movies = [];

        while ($red = $result_set->fetch_object()) {
            $movie = new Movie($red->movieID, $red->name, $red->director, $red->releaseDate);
            $movies[] = $movie;
        }

        echo json_encode($movies);
    }

    if ($operacija == "RETURN_USERS") {
        $sql = "SELECT id, username, roleName FROM users u JOIN roles r ON u.roleID = r.roleID";

        $result_set = $conn -> query($sql);
        $users = [];

        while ($red = $result_set->fetch_object()) {
            $user = new User($red->id, $red->username, $red->roleName);
            $users[] = $user;
        }

        echo json_encode($users);
    }

    if($operacija == 'DELETE_MOVIE'){
        $id = trim($_GET['id']);
    
        $sql = "DELETE FROM movies WHERE movieID =" . $id;
        if($conn->query($sql)){
            echo 'USPESNO IZBRISAN FILM';
        }else{
            echo 'DOSLO JE DO GRESKE';
        }
    }
?>