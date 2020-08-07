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
            echo("Korisnicko ime je zauzeto!");
        }
    }

    if ($operacija == "LOGIN") {
        session_start();

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

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

    if ($operacija == "GET_USER") {
        session_start();

        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        $sql = "SELECT * FROM users WHERE username = '{$username}'";
        $result_set = $conn -> query($sql);

        while ($red = $result_set -> fetch_object()) {
            $user = new User($red->id, $red->username, $password, $red->roleID);
        }$result_set = $conn -> query($sql);

        echo json_encode($user);
    }

    if ($operacija == "UPDATE_USER") {
        session_start();

        $old_username = $_SESSION['username'];

        $new_username = trim($_POST["username"]);
        $new_password = trim($_POST["password"]);
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

        $sql="UPDATE users SET username='{$new_username}', password='{$new_password_hashed}' WHERE username='{$old_username}'";

        $conn->query($sql);

        $_SESSION['username'] = $new_username;
        $_SESSION['password'] = $new_password;
    }

    if ($operacija == "LOG_OUT") {
        session_abort();
    }

    if ($operacija == "DELETE_USER") {
        session_start();

        $username = $_SESSION['username'];

        $sql = "DELETE FROM users WHERE username='{$username}';";
        $conn -> query($sql);

        session_abort();
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
        $sql = "SELECT * FROM movies ORDER BY name ASC";

        $result_set = $conn -> query($sql);
        $movies = [];

        while ($red = $result_set->fetch_object()) {
            $movie = new Movie($red->movieID, $red->name, $red->director, $red->releaseDate, $red->leadActors, $red->supportingActors);
            $movies[] = $movie;
        }
        echo json_encode($movies);
    }

    if ($operacija == "SEARCH_MOVIES") {
        $search = trim($_GET["search"]);

        $sql = "SELECT * FROM movies WHERE name like '%{$search}%' OR director like '%{$search}%' OR leadActors like '%{$search}%' OR supportingActors like '%{$search}%';";
        $result_set = $conn->query($sql);

        while ($red = $result_set->fetch_object()) {
            $movie = new Movie($red->movieID, $red->name, $red->director, $red->releaseDate, $red->leadActors, $red->supportingActors);
            $movies[] = $movie;
        }

        echo json_encode($movies);
    }

    if ($operacija == "GET_MOVIE") {
        $id = trim($_GET['id']);
        $sql = "SELECT * FROM movies WHERE movieID={$id}";

        $result_set = $conn -> query($sql);

        while ($red = $result_set -> fetch_object()) {
            $movie = new Movie($red->movieID, $red->name, $red->director, $red->releaseDate, $red->leadActors, $red->supportingActors);
        }

        echo json_encode($movie);
    }

    if ($operacija == "UPDATE_MOVIE") {
        $movieID = trim($_POST["movieID"]);
        $name = trim($_POST["name"]);
        $director = trim($_POST["director"]);
        $release_date = trim($_POST["release_date"]);
        $lead_actors = trim($_POST["lead_actors"]);
        $supporting_actors = trim($_POST["supporting_actors"]);

        $sql="UPDATE movies SET name='{$name}', director='{$director}', releaseDate={$release_date}, 
            leadActors='{$lead_actors}', supportingActors='{$supporting_actors}' WHERE movieID={$movieID}";

        $conn->query($sql);
    }

    if($operacija == 'DELETE_MOVIE'){
        $id = trim($_GET['id']);
    
        $sql = "DELETE FROM movies WHERE movieID =" . $id;
        $conn->query($sql);
    }
?>