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

    // $day = '2009-11-23'; //can use $_GET here
    $sth = $dbh->prepare("SELECT * FROM comic ORDER BY `date` DESC LIMIT 1"); //never put variables in here
    $sth->execute();
    $comic = $sth->fetch(); //stores comics in associative array

    // var_dump($comic);
    

    // //getting multiple rows
    // $sth = $dbh->prepare("SELECT * FROM comic WHERE date >= :start AND date <= :end ORDER BY date DESC LIMIT 10");
    // $sth->bindValue(':start', '2011-01-01');
    // $sth->bindValue(':end', '2011-12-31');
    // $sth->execute();
    // $comics = $sth->fetchAll(); //an array of arrays
    // //$comics[0]['title']
}
catch (PDOException $e) {
    echo "<p>Error connecting to database!</p>";
    echo "<p>" . $error->getMessage() . "</p>";
}

echo "<h1>First query</h1>";
echo "<p>Comic from {$comic['date']}</p>";
echo "<p>{$comic['title']}</p>";

echo "<h2>Comics</h2>";

    echo '<img src="/../../chalkboardmanifesto/'.$comic['fileName'].'">'; // remember the closing quote
    echo "<p>".$comic['title']."</p>";
    echo "<p>".$comic['date']."</p>";

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