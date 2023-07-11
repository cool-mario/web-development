<!-- https://atdpsites.berkeley.edu/rastley/aicdemos/07/pdoconnect.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connecting to database!! wow OwO UwU <3</title>
</head>
<body>
<?php

// note: code never tested before
// define a constant
define('DB_DSN', "mysql:host=localhost;dbname=acchan");

// try catch the error if the database is broke
try {
// create database object, replace password with actual password
    $dbh = new PDO(DB_DSN, "acchan", "password");
    // get stuff from the database (I have no idea what i'm doing btw)
    $sth = $dbh->prepare("SELECT * FROM visitors WHERE visit_date = '2013-06-02'");
    $sth->execute();
    $visitor = $sth->fetch();

    var_dump($visitor);

    $date = new DateTime($visitor["visit_date"]);
    echo "<p>" . $date->format("d-m-Y") . "</p>";

    // warning: NEVER PUT A VARIABLE IN AN SQL QUERY!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // SECUERITY ALERTTTTTTTTTT!!!!!!!!!!!!!!!!!!!!! (SQL injection!!!)
    
    $sth = $dbh->prepare("SELECT * FROM visitors WHERE visit_date = $randomVariable"); // noooooooooooooooo

    $sth = $dbh->prepare("SELECT * FROM visitors WHERE visit_date = :date"); // yess
    $sth->bindValue(":date", $day);
    $sth->execute();
    $visitor = $sth->fetch();
    // $visitor = $sth->fetchAll(); // fetch multiple rows
    echo $visitor["visitor_name"];
    

    echo "<pre>";
    print_r($visitor); // pretty print
    echo "</pre>";

    // aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaamnjhnbvvhkbfgkfhiuhdfiughishiudvjbhlbbbggfdddcdcdfgghhhnkjkkikl;l.kljkjkj

}
catch (PDOException $error){
    echo "<p>Error connecting to database....</p>";
    echo "<p>" . $error->geetMessage() . "</p>";
}

?>
</body>
</html>