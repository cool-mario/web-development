<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: black;
            color: antiquewhite;
        }
        /* make table look better */
        th, td {
            background-color:  rgb(75,73,129);
            padding: 10px;
        }
    </style>

    <title>Your Results</title>
</head>
<body>
    <h1>Your results!</h1>
    <br>
    <?php

    // var_dump($_POST);

    echo '<table>';
    echo '<tr><th>Key</th><th>Value</th></tr>';

    foreach ($_POST as $key => $value) {
        echo '<tr><td>' . htmlspecialchars($key) . '</td><td>' . htmlspecialchars($value) . '</td></tr>';
    }
    echo '</table>';

    $nerd = array(
        "math" => 0,
        "chem" => 0,
        "cs" => 0,
        "physics" => 0,
        "lit" => 0, // literature
        "not" => 0,
    );
    // $mathNerd = 0;      // math
    // $chemNerd = 0;      // Chemistry
    // $csNerd   = 0;      // Computer Science
    // $historyNerd = 0;   // History
    // // $engineerNerd = 0;  // Engineer
    // $litNerd  = 0;      // Literature Nerd 
    // $notANerd = 0;      // not a nerd!

    // get all the post request values
    $character = $_POST["character"];
    $sleepHours = $_POST["sleepHours"];
    $skool = $_POST["skool"];
    $equation = $_POST["equation"];
    $youtube = $_POST["youtube"];
    $socialMedia = $_POST["socialMedia"];
    $projects = $_POST["projects"];
    $pickClothes = $_POST["pickClothes"];
    $workspace = $_POST["workspace"];

    // 1
    if ($character == "walter_white"){
        $nerd["chem"]++;
    } elseif ($character == "sheldon") {
        $nerd["math"]++;
    } elseif ($character == "harry") {
        $nerd["lit"]++;
    } elseif ($character == "blackMirror") {
        $nerd["cs"]++;
    }
    // 2
    if ($sleepHours > 6){
        $nerd["not"]++;
    } else {
        $nerd["chem"]++;
        $nerd["math"]++;
        $nerd["chem"]++;
        $nerd["cs"]++;
        $nerd["history"]++;
        $nerd["lit"]++;
    }
    // 3
    $nerd[$skool]++;
    // 4
    $nerd[$equation]++;

    var_dump($nerd);


    


    ?>
    
</body>
</html>