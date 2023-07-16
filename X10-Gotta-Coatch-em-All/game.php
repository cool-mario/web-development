<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Parkamon game</title>
</head>
<body>
    <h1>Parkamon!!</h1>
    <p>(Definitly not a knockoff of Pokemon)</p>


    <form action="catch.php" method="post">
        <h2>Catch a Parka:</h2>
        <p>Choose a player:</p>
        <?php
        require_once "config.php";
        
        try {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $sth = $dbh->prepare("SELECT * FROM `player`");
            
            $sth->execute();
            $players = $sth->fetchAll();
            
            echo "<select name='players'>";
            // loop thru players
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
                echo "{$thing['name']} has a {$thing['breed']} named \"{$thing['nickname']}\"! ";
                echo "Its location is the {$thing['location']}";

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

            $sth = $dbh->prepare("SELECT parkamon.breed, ownership.id, nickname  FROM `ownership`
                                  JOIN `parkamon` ON ownership.parkamon_id = parkamon.id
                                ");
            $sth->execute();
            $ownedParkas = $sth->fetchAll();

            // var_dump($ownedParkas);
            echo "<p>Select Parkamon: ";
            echo "<select name='renameID'>";
            foreach ($ownedParkas as $parka){
                echo "<option value='{$parka['id']}'>a " . $parka["breed"] . " named \"" . $parka["nickname"]."\"</option>";
            }

            echo "</select></p>";

            echo '<p>Give a new name: (8 chars max)</p><input type="text" maxlength="8" name="newname" placeholder="new name here" required>';
            echo '<input type="submit" value="Rename">';
        } catch (PDOException $e) {
            echo "<p>Error: {$e->getMessage()}</p>";
        }
    

        ?>
    </form>

    <h2>Release your parkamon into the wild! (*^‿^*)</h2>
    <form action="release.php" method="post">
            
        <?php
        
        try {

            $sth = $dbh->prepare("SELECT parkamon.breed, ownership.id, nickname  FROM `ownership`
                                  JOIN `parkamon` ON ownership.parkamon_id = parkamon.id
                                ");
            $sth->execute();
            $ownedParkas = $sth->fetchAll();

            // var_dump($ownedParkas);
            echo "<p>Select Parkamon to release: ";
            echo "<select name='releaseID'>";
            foreach ($ownedParkas as $parka){
                echo "<option value='{$parka['id']}'>a " . $parka["breed"] . " named \"" . $parka["nickname"]."\"</option>";
            }

            echo "</select></p>";

            echo '<input type="submit" value="Release">';
        } catch (PDOException $e) {
            echo "<p>Error: {$e->getMessage()}</p>";
        }
    
        ?>
    </form>
    
</body>
</html>