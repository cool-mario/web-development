<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: black;
            color: antiquewhite;
            margin-left: 3%;
        }
        /* make table look better */
        th, td {
            background-color:  rgb(75,73,129);
            padding: 10px;
        }
        /* selects the nerd level thats the highest */
        tr.highlight > td {
            background-color: rgb(0 139 255);
            color: yellow;
            font-weight: bold;
        }
    </style>

    <title>Your Results</title>
</head>
<body>
    <!-- <h1>Your results!</h1> -->
    <?php

    require_once("functions.php");
    // var_dump($_POST);
    // print_array($_POST);
    

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
    $sports = $_POST["sports"] ?? "off"; // if the box isn't checked it doesn't exist
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
        inc_nerd($nerd);
    }
    // 3
    $nerd[$skool]++;
    // 4
    $nerd[$equation]++;
    // 5: youtube
    $nerd[$youtube]++;

    // 6: social media
    if ($socialMedia == "a lot"){
        $nerd["not"] += 2;
    } elseif ($socialMedia == "more than 30"){
        $nerd["not"]++;
    } elseif ($socialMedia == "a little"){
        $nerd = inc_nerd($nerd);
    }

    // 7 sports
    if ($sports == "on"){
        $nerd["not"]++;
    } else {
        $nerd = inc_nerd($nerd);
    }

    // 8 introvert
    if ($projects == "group"){
        $nerd["not"]++;
    } else {
        $nerd = inc_nerd($nerd);
    }

    // 9 fashion
    if ($pickClothes == "barely"){
        $nerd = inc_nerd($nerd,2);
    } elseif ($pickClothes == "1min"){
        inc_nerd($nerd);
    } elseif ($pickClothes == "a few"){
        $nerd["not"]++;
    } elseif ($pickClothes == "zero"){
        $nerd = inc_nerd($nerd,3);
    } elseif ($pickClothes == "a lot"){
        $nerd["not"] += 2;
    }

    // 10 workspace
    if ($workspace == "organized"){
        $nerd["math"]++;
        $nerd["cs"]++;
    } elseif ($workspace == "experiment"){
        $nerd["chem"]++;
        $nerd["physics"]++;
    } elseif ($workspace == "art"){
        $nerd["literature"]++;
    } elseif ($workspace == "tech"){
        $nerd["cs"]++;
    } elseif ($workspace == "books"){
        $nerd["literature"]++;
        $nerd["history"]++;
    } elseif ($workspace == "dump"){
        // increase the highest nerd there is
        $nerd[highest($nerd)]++;
    }
    
    // sort the array so that the highest is first
    arsort($nerd);
    $highest = key($nerd); // the key with the highest value

    $fullName = array(
        "math" => "Math",
        "chem" => "Chemistry",
        "cs" => "Computer Science",
        "physics" => "Physics",
        "lit" => "Literature",
        "not" => "Not a nerd",
    );

    if ($fullName[$highest] == "Not a"){
        echo "<h1>You are not a nerd?!</h1>";
    } else {
        echo "<h1>You are a $fullName[$highest] nerd!</h1>";
        echo '<img src="../nerd.jpg" alt="NERRRRD!!!" width="300" height="100" id="nerd">';
    }

    
    echo '<br><br><table>';
    echo '<tr><th>Nerd type</th><th>Amount of nerd</th></tr>';

    foreach ($nerd as $key => $value) {
        if ($highest == $key){ // if the element is the highest one
            echo '<tr class="highlight"><td>' . htmlspecialchars($fullName[$key]) . '</td><td>' . htmlspecialchars($value) . '</td></tr>';
        } else {
            echo '<tr><td>' . htmlspecialchars($fullName[$key]) . '</td><td>' . htmlspecialchars($value) . '</td></tr>';
        }
        
    }
    echo '</table>';

    


    ?>

    
    
</body>
</html>