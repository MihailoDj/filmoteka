<?php
    include 'init.php';

    if (!isset($_GET['metoda']) && !isset($_POST['metoda'])) {
        die("Greska!");
    }

    $operacija = isset($_GET['metoda']) ? $_GET['metoda'] : $_POST['metoda'];

    if ($operacija == "REGISTER") {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if ($username == "") {
            echo("Unesite korisničko ime.   <span class=\"close-error\">&#10006;</span>");
            return;
        }

        if ($password == "") {
            echo("Unesite lozinku!  <span class=\"close-error\">&#10006;</span>");
            return;
        }

        if (strlen($password) < 8) {
            echo("Lozinka mora imati bar 8 karaktera!   <span class=\"close-error\">&#10006;</span>");
            return;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE username='{$username}'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO users VALUES(DEFAULT, '{$username}', '{$hashed_password}', 2);";

            if ($conn->query($sql)) {
                echo('<script type="text/javascript">location.href = \'index.php\';</script>');
            } else {
                echo("Neuspešna registracija.   <span class=\"close-error\">&#10006;</span>");
            }
        } else {
            echo("Korisničko ime je zauzeto!    <span class=\"close-error\">&#10006;</span>");
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
            echo("Takav korisnik ne postoji!    <span class=\"close-error\">&#10006;</span>");
        } else {
            if (password_verify($password, $result->fetch_object()->password)) {
                if ($username == "admin@filmoteka.com") {
                    echo('<script type="text/javascript">location.href = \'admin_panel.php\';</script>');
                } else {
                    echo('<script type="text/javascript">location.href = \'search_movies.php\';</script>');
                }
            } else {
                echo("Pogrešna lozinka! <span class=\"close-error\">&#10006;</span>");
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

        if ($new_username == "") {
            echo("Unesite korisničko ime!   <span class=\"close-error\">&#10006;</span>");
            return;
        }

        if ($new_password == "") {
            echo("Unesite lozinku!  <span class=\"close-error\">&#10006;</span>");
            return;
        }

        if (strlen($new_password) < 8) {
            echo("Nova lozinka mora imati bar 8 karaktera!  <span class=\"close-error\">&#10006;</span>");
            return;
        }

        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

        $sql="UPDATE users SET username='{$new_username}', password='{$new_password_hashed}' WHERE username='{$old_username}'";

        if ($conn->query($sql)) {
            $_SESSION['username'] = $new_username;
            $_SESSION['password'] = $new_password;

            echo("Podešavanja uspešno sačuvana. <span class=\"close-error\">&#10006;</span>");
        } else {
            echo("Korisničko ime je već zauzeto!    <span class=\"close-error\">&#10006;</span>");
        }

    }

    if ($operacija == "LOG_OUT") {
        session_start();
        $_SESSION = array();
        session_destroy();
    }

    if ($operacija == "DELETE_USER") {
        session_start();

        $username = $_SESSION['username'];

        $sql = "DELETE FROM users WHERE username='{$username}';";
        $conn -> query($sql);

        session_destroy();
    }

    if ($operacija == "ADD_MOVIE") {
        $name = trim($_POST["name"]);
        $director = trim($_POST["director"]);
        $release_date = trim($_POST["release_date"]);
        $lead_actors = trim($_POST["lead_actors"]);
        $supporting_actors = trim($_POST["supporting_actors"]);

        if ($name == "" || $director == "" || $release_date == "" || $lead_actors == "" || $supporting_actors == "") {
            echo("Sva polja moraju biti popunjena.  <span class=\"close-error\">&#10006;</span>");
            return;
        }

        $sql = "INSERT INTO movies VALUES(DEFAULT, '{$name}', '{$director}', {$release_date}, '{$lead_actors}', '{$supporting_actors}');";
        if (!$conn->query($sql)) {
            echo("Takav film već postoji u bazi.    <span class=\"close-error\">&#10006;</span>");
            return;
        }

        echo("Film uspešno sačuvan. <span class=\"close-error\">&#10006;</span>");
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
        $movies = [];

        while ($red = $result_set->fetch_object()) {
            $movie = new Movie($red->movieID, $red->name, $red->director, $red->releaseDate, $red->leadActors, $red->supportingActors);
            $movies[] = $movie;
        }

        echo json_encode($movies);
    }

    if ($operacija == "SAVE_MOVIE") {
        session_start();

        $movieID = trim($_GET['id']);
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username='{$username}';";
        $result_set = $conn->query($sql);
        $userID = null;

        while($red = $result_set->fetch_object()) {
            $userID = $red->id;
        }
        
        $sql = "INSERT INTO savedmovies VAlUES (DEFAULT, {$userID}, {$movieID});";
        
        if (!$conn->query($sql)) {
            echo("Već ste sačuvali ovaj film.   <span class=\"close-error\">&#10006;</span>");
        } else {
            echo("Film uspešno sačuvan.   <span class=\"close-error\">&#10006;</span>");
        }
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

        if ($movieID == "" || $name == "" || $director == "" || $release_date == "" || $lead_actors == "" || $supporting_actors == "") {
            echo("Sva polja moraju biti popunjena.    <span class=\"close-error\">&#10006;</span>");
            return;
        }

        $sql="UPDATE movies SET name='{$name}', director='{$director}', releaseDate={$release_date}, 
            leadActors='{$lead_actors}', supportingActors='{$supporting_actors}' WHERE movieID={$movieID}";

        if (!$conn->query($sql)) {
            echo("Došlo je do greške pri čuvanju.    <span class=\"close-error\">&#10006;</span>");
            return;
        }
        echo("Podaci uspešno izmenjeni.    <span class=\"close-error\">&#10006;</span>");
    }

    if($operacija == 'DELETE_MOVIE'){
        $id = trim($_GET['id']);
    
        $sql = "DELETE FROM movies WHERE movieID =" . $id;
        $conn->query($sql);
        echo("Film uspešno obrisan. <span class=\"close-error\">&#10006;</span>");
    }

    if ($operacija == "RETURN_SAVED_MOVIES") {
        session_start();
        $username = $_SESSION['username'];

        $sql = "SELECT * FROM savedmovies sm JOIN movies m ON sm.movieID=m.movieID WHERE sm.userID IN (SELECT id FROM users WHERE username='{$username}');";
        $rs = $conn->query($sql);

        $movies = [];
        while($red = $rs->fetch_object()) {
            $movie = new Movie($red->movieID, $red->name, $red->director, $red->releaseDate, $red->leadActors, $red->supportingActors);
            $movies[] = $movie;
        }

        echo json_encode($movies);
    }

    if ($operacija == "DELETE_SAVED_MOVIE") {
        session_start();

        $movieID = $_GET['id'];
        $username = $_SESSION['username'];

        $sql = "DELETE FROM savedmovies WHERE movieID={$movieID} AND userID IN (SELECT id FROM users WHERE username='{$username}');";

        $conn->query($sql);
        echo("Film uspešno obrisan. <span class=\"close-error\">&#10006;</span>");
    }
?>