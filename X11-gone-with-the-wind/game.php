<?php 
session_start(); 

// if no post or sessions
if (empty($_POST) && empty($_SESSION)){
    header( "Location: signin.php");
    die();
}


require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Parkamon game</title>
</head>
<body>


    <?php
    // if there is no player id in session, update the session with POST
    if (isset($_SESSION["player_id"])){
    
    } elseif (isset($_POST) && isset($_POST["player"])){ 
        
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        // get the player with the matching id
        $sth = $dbh->prepare("SELECT * FROM player WHERE id = :userid");
        $sth->bindValue(":userid", $_POST["player"]);
        $sth->execute();
        $user = $sth->fetch();

        // check if password is good
        if (password_verify($_POST["password"], $user["password_hash"])){
            // set session thing
            $_SESSION["player_id"] = $_POST["player"];
        } else {
            echo "<p>Wrong password!!</p>";
            header( "Location: signin.php?m=wrong"); // go back to sign in if password is wrong
            die();
        }
    }

    try {

        
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

        

        // get the list of valid players (for validation)
        $sth = $dbh->prepare("SELECT * FROM player WHERE id = :userid");
        $sth->bindValue(":userid", $_SESSION["player_id"]);
        $sth->execute();
        $player = $sth->fetch();

        

        echo "<h1>Logged in as " . $player["name"] . "</h1>";
        


    }
    catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
    }
    
    
    ?>


    <h1>Parkamon!!</h1>
    <p>(Definitly not a knockoff of Pokemon)</p>

    <form action="catch.php" method="post">
        <h2>Catch a Parka:</h2>
        <?php
        

        
        
        try {
            // $sth = $dbh->prepare("SELECT * FROM `player`");
            
            // $sth->execute();
            // $players = $sth->fetchAll();
            
            // remove player dropdown list
            // echo "<select name='players'>";
            // // loop thru players
            // foreach ($players as $person){
            //     echo "<option value='{$person['id']}'>".$person["name"].'</option>';
            // }

            // echo "</select>";
            echo '<input type="submit" value="Catch a Parkamon!">';



        }
        catch (PDOException $e) {
            echo "<p>Error: {$e->getMessage()}</p>";
        }
        ?>
    </form>
    <h2>Caught parkamon:</h2>
        <?php
        try {

            $sth = $dbh->prepare("SELECT ownership.id AS ownership_id, ownership.nickname, ownership.player_id, ownership.parkamon_id, parkamon.breed, parkamon.location, parkamon.id AS parkamon_id, player.name
                                  FROM `ownership` 
                                  JOIN `player` ON ownership.player_id = player.id 
                                  JOIN `parkamon` ON ownership.parkamon_id = parkamon.id 
                                  WHERE ownership.player_id = :userid
                                  ORDER BY player.name, parkamon.breed, ownership.nickname
                                ");
            $sth->bindValue(":userid", $_SESSION["player_id"]);
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



    echo '<h2>Rename your parkamon! ^_^</h2>';
    echo '<form action="rename.php" method="post">';
            

        
        try {

            // $sth = $dbh->prepare("SELECT parkamon.breed, ownership.id, nickname, player.name  FROM `ownership`
            //                       JOIN `parkamon` ON ownership.parkamon_id = parkamon.id
                                  
            //                     ");
            // $sth->bindValue()
            // $sth->execute();
            // $ownedParkas = $sth->fetchAll();

            // var_dump($ownedParkas);
            echo "<p>Select Parkamon: ";
            echo "<select name='renameID'>";
            foreach ($everything as $parka){

                echo "<option value='{$parka['ownership_id']}'>" . $parka["breed"] . " named \"" . $parka["nickname"]."\"</option>";

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
    <br><br>
    <a href="signout.php">Sign Out</a>
    
</body>
</html>