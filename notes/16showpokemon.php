<?php
require_once "16pokemon.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Pokemon!!!!!!</title>
</head>
<body>
<?php

    // create pokemon object
    $lightbulb = new Pokemon("Jelly");
    // call a function from the object
    $lightbulb->talk();

?>
    
</body>
</html>