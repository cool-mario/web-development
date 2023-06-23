<?php
require_once "header.php"; // import the header from the other file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        p {
            padding-left:40px;
        }
        h1 {
            padding-left:20px;
        }

    </style>

    <title>X2</title>
</head>
<body>

    <?php
    headerThing(); // the header thing
    // var_dump($_POST);  // dump the post

    $name = $_POST["name"];             // text input
    $wur = $_POST["would_you_rather"];  // radio
    $apClasses = $_POST["APclasses"];   // number
    $sleepTime = $_POST["sleepytime"];  // time input (bonus)
    $aiArt = $_POST["AIart"];           // text area
    $cloneFight = $_POST["fightQ"];     // another text area
    $chicken = $_POST["chicken"];       // dropdown
    $mathType = $_POST["math-type"] ?? null;             // checkbox (extra credit)
    $englishType = $_POST["english-type"] ?? null;       // checkbox (extra credit)

    echo "<p>Hello " . htmlspecialchars($name) . "!!! <strong>Here are your results:</strong> </p>";

    if ($wur == "1am_gang"){
        echo "<p>You like to sleep at 1 AM. =)</p>";
    } else {
        echo "<p>so you would rather sleep and have missing homework! hmmmm is health more important than grades? i guess</p>";
    }

    echo "<p>You took " . htmlspecialchars($apClasses) . " AP classes! nice";
    
    echo "<p>You usually sleep at " . htmlspecialchars($sleepTime) . "! wow.";

    echo "<p>This is what you think about AI art: " . htmlspecialchars($aiArt) . "</p>";
    echo "<p>Here is how you will defeat a clone of yourself: " . htmlspecialchars($cloneFight) . "</p>";

    echo "<p>So why did the chicken cross the road? " . htmlspecialchars($chicken) . "</p>";
    echo "<p><strong>checkbox answers:</strong></p>";
    if ($mathType == "Math"){
        echo "<p>You like Math!!!</p>";
    } 
    if ($englishType == "English"){
        echo "<p>You are an english person! plz write essays for me </p>";
    }

    ?>
    
</body>
</html>

