<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Catch a Parka</title>
</head>
<body>


    <?php

    require_once "config.php";
            
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        // select a random parkamon
        $sth = $dbh->prepare("SELECT * FROM `parkamon` ORDER BY RAND() LIMIT 1");
        $sth->execute();
        $parkamon = $sth->fetch();

        var_dump($_SESSION);

        // get the list of valid players (for validation)
        $sth = $dbh->prepare("SELECT * FROM player ORDER BY `id` DESC LIMIT 1");
        $sth->execute();
        $player = $sth->fetchAll();
        $lastPlayerID = $player[0]["id"];

        if ($_SESSION["UserID"] > $lastPlayerID || $_SESSION["UserID"] < 0){
            echo "<p>Your player is invalid!!! >_<</p>";
            die();
        }

        // update the owners
        $sth = $dbh->prepare("INSERT INTO ownership (`player_id`,`parkamon_id`,`nickname`) VALUES (:player, :parkamon, 'Joe')");
        $sth->bindValue(':player', $_SESSION["UserID"]);
        $sth->bindValue(':parkamon', $parkamon['id']);
        $success = $sth->execute();

        if ($success){
            echo "<h2>A Parkamon was caught!</h2>";
        } else {
            echo "<p>There was an error and u didn't catch anything L + ratio</p>";
        }
        


    }
    catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
        echo "<p>Try reloading or something idk</p>";
    }



    ?>

    <a href="game.php">Go back to the game</a>

    
</body>
</html>