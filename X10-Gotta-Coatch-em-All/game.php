<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Parkamon game</title>
</head>
<body>
    <h1>Catch a Parkamon!!</h1>
    <form action="catch.php" method="post">

        <p>Choose a player:</p>

        <?php
        // loop thru players

        require_once "config.php";
        
        try {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $sth = $dbh->prepare("SELECT * FROM `player`");
            
            $sth->execute();
            $players = $sth->fetchAll();
            
            echo "<select name='players'>";
            foreach ($players as $person){
                echo "<option value='{$person['id']}'>".$person["name"].'</option>';
            }

            echo "</select>";
            echo '<input type="submit" value="Catch!">';



        }
        catch (PDOException $e) {
            echo "<p>Error: {$e->getMessage()}</p>";
        }
        ?>
    </form>
    <h2>Caught parkamon:</h2>
        <?php
        try {

            $sth = $dbh->prepare("SELECT nickname, player_id, parkamon_id, parkamon.breed, parkamon.location, player.name FROM `ownership` 
                                  JOIN `player` ON ownership.player_id = player.id 
                                  JOIN `parkamon` ON ownership.parkamon_id = parkamon.id 
                                  ORDER BY player.name, parkamon.breed, ownership.nickname
                                ");
            $sth->execute();
            $everything = $sth->fetchAll();
            // var_dump($everything);
            foreach ($everything as $thing) {
                echo "<p>";
                echo "{$thing['name']} has a {$thing['nickname']}! ";
                echo "Its Breed: {$thing['breed']}, Location: {$thing['location']}";

                echo "</p>";
            }

        } catch (PDOException $e) {
            echo "<p>Error: {$e->getMessage()}</p>";
        }

        ?>
    <h2>Rename your parkamon! ^_^</h2>
    <form action="rename.php" method="post">
            
        <?php
        
        try {
            echo "<select name='parkamon'>";
            foreach ($players as $person){
                echo "<option value='{$person['id']}'>".$person["name"].'</option>';
            }

            echo "</select><br>";

            echo '<p>New name:</p><input type="text" maxlength="8">';
            echo '<input type="submit" value="Catch!">';
        } catch (PDOException $e) {
            echo "<p>Error: {$e->getMessage()}</p>";
        }
    

        ?>
        

    </form>

    
</body>
</html>