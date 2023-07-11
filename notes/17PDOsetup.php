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

}
catch (PDOException $error){
    echo "<p>Error connecting to database....</p>";
    echo "<p>" . $error->geetMessage() . "</p>";
}

?>
</body>
</html>