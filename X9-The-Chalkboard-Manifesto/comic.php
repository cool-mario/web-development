<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fancy.css">
    <title>The Latest comic!</title>
</head>
<body>
    
<?php
require 'config.php';

try {

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    // fetches the latest comic ID
    $sth = $dbh->prepare("SELECT * FROM comic ORDER BY `date` DESC LIMIT 1"); //never put variables in here
    $sth->execute();
    $comic = $sth->fetch(); //stores comics in associative array
    $lastID = $comic["comicID"];

    // validate if its an int and is in bounds

        
        if (!isset($_GET["id"]) || !filter_var($_GET["id"], FILTER_VALIDATE_INT) || $_GET["id"] < 1 || $_GET["id"] > $lastID){
            echo '<p class="error">ID is not valid!!! Got latest comic.</p>';
            # get latest comic
            $sth = $dbh->prepare("SELECT * FROM comic ORDER BY `date` DESC LIMIT 1"); //never put variables in here
            $id = 1;
        }
        else {
            // if the id is valid
            $id = $_GET["id"]; // get id thing
            # get comic based on what the id is
            $sth = $dbh->prepare("SELECT * FROM comic WHERE comicID = :thing"); //never put variables in here
            $sth->bindValue(':thing', $id);

        }
    
    $sth->execute();
    $comic = $sth->fetch(); //stores comics in associative array

    // get comic info
    $sth = $dbh->prepare("SELECT * FROM info WHERE comicID = :thing");
    $sth->bindValue(':thing', $id);
    $sth->execute();
    $info = $sth->fetch(); //stores comics in associative array
}
catch (PDOException $error) {
    echo "<p class='error'>Error connecting to database!</p>";
    echo "<p>" . $error->getMessage() . "</p>";
    die(); 
}

echo "<h1>Comics!!</h1>";
echo "<h2>{$comic['title']}</h2>";
echo "<p>Comic from {$comic['date']}</p>";

$nextID = $id+1;
$prevID = $id-1;
echo '<a href="comic.php?id=' . $prevID . '">Previous</a>';
echo '<a href="comic.php?id=' . $nextID . '">Next</a>'; 
echo '<a href="comic.php?id=' . $lastID . '">Latest</a>'; 
echo '<br><br>';
// extra credit
// if there is no info, $info is a boolean for some reason
if (gettype($info) != "boolean"){
    echo "<p>".$info["text"]."</p>";
}
echo '<img src="/../../chalkboardmanifesto/'.$comic['fileName'].'" class="comic">'; // remember the closing quote




// print an array of comics
// foreach ($comics as $comic) {
//     echo '<img src="//atdpsites.berkeley.edu/chalkboardmanifesto/'.$comic['fileName'].'">'; // remember the closing quote
    
//     echo "<p>".$comic['title']."</p>";
//     echo "<p>".$comic['date']."</p>";
//     $myDate = $comic['date'];
//     // $prettyDate = $myDate->format("d-m-Y"); //look up format on PHP.net
//     // echo "<p>".$prettyDate."</p>";
//     // echo var_dump($comic);
// }


?>

</body>
</html>