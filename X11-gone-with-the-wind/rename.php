<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php

    require_once "config.php";
            
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

        $sth = $dbh->prepare("SELECT id FROM `ownership`");
        $sth->execute();
        $ownerships = $sth->fetch();
        
    
        // validation is the if statement
        if (isset($_POST["renameID"]) && isset($_POST["newname"]) && strlen($_POST["newname"]) <= 8){

            // check if pokemon getting renamed is owned by teh right person


            // rename the pokemon
            $sth = $dbh->prepare("UPDATE `ownership`
                                  SET nickname = :newname
                                  WHERE id = :id
                                ");
            $sth->bindValue(':newname', $_POST["newname"]);
            $sth->bindValue(':id', $_POST['renameID']);
            $success = $sth->execute();

            if ($success){
                echo "<h2>Parkamon renamed!</h2>";
            } else {
                echo "<p>There was an error your Parkamon wasn't renamed...</p>";
            }

        } else {
            echo "<p>You submitted something wrong!</p>";
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