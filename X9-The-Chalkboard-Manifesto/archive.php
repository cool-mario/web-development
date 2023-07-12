<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fancy.css">
    <title>The Archives</title>
</head>
<body>
<?php
require 'config.php';

try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);


    //getting multiple rows
    $sth = $dbh->prepare("SELECT * FROM comic WHERE date >= :start ORDER BY date DESC");
    $sth->bindValue(':start', '2005-05-01');
    $sth->execute();
    $comics = $sth->fetchAll(); //an array of arrays
    //$comics[0]['title']
}
catch (PDOException $error) {
    echo "<p>Error connecting to database!</p>";
    echo "<p>" . $error->getMessage() . "</p>";
}

echo "<h1>The Comic Archives</h1>";

// loop through all the comics
foreach ($comics as $comic) {     
    echo '<a href="//atdpsites.berkeley.edu/chalkboardmanifesto/'.$comic['fileName'].'">';
    echo $comic['date'] . "&ensp;"; // this is a big space character
    echo $comic['title'];

    echo '</a><br>';
   
    $myDate = $comic['date'];
}

?>

</body>
</html>