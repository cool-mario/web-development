
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" cSuanneontent="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign in</title>
</head>
<body>
    <h1>Welcome to Parkamon!!</h1>
    <h2>Sign in</h2>
    <form action="game.php" method="post">

    <?php

    // make a config file with 3 constants
    require_once "config.php";
            
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth = $dbh->prepare("SELECT * FROM `player`");
        
        $sth->execute();
        $players = $sth->fetchAll();
        
        echo "<p>Choose player: <select name='player'></p>";
        // loop thru players
        foreach ($players as $person){
            echo "<option value='{$person['id']}'>".$person["name"].'</option>';
        }

        echo "</select>";
        echo "<p>Password: ";
        echo '<input type="password" name="password">';
        echo "</p>";

        echo '<input type="submit" value="Log in">';
        // extra credit: 
        if (isset($_GET['m']) && $_GET['m'] == "wrong"){
            echo "<br><br><strong class='red'>Incorrect Password!!!!</strong>";
        }

    }
    catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
        echo "<p>Try reloading or something idk</p>";
    }





    ?>

    </form>
    
</body>
</html>