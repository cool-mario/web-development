<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="results.css">
    <style>
        header {
            /* the background is the user's favorite color! */
            
            <?php 
                // check if it exists before adding the style
                if (isset($_POST["color"]) && $_POST["color"] != ""){
                    echo "background-color: " . htmlspecialchars($_POST["color"]) . ";";
                }
            ?>
        }
    </style>

    <title>Your Results</title>
</head>
<body>
    <!-- <h1>Your results!</h1> -->
    <?php

    require_once("header.php");

    require_once("functions.php");
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
    $character = $_POST["character"] ?? null;
    $sleepHours = $_POST["sleepHours"] ?? null;
    $skool = $_POST["skool"] ?? null;
    $equation = $_POST["equation"] ?? null;
    $youtube = $_POST["youtube"] ?? null;
    $socialMedia = $_POST["socialMedia"] ?? null;
    $sports = $_POST["sports"] ?? null; // if the box isn't checked it doesn't exist
    $projects = $_POST["projects"] ?? null;
    $pickClothes = $_POST["pickClothes"] ?? null;
    $workspace = $_POST["workspace"] ?? null;
    

    // 1. favorite tv show/movie
    if (!isset($character)){
        deny(1);
    }
    if ($character == "walter_white"){
        $nerd["chem"]++;
    } elseif ($character == "sheldon") {
        $nerd["math"]++;
    } elseif ($character == "harry") {
        $nerd["lit"]++;
    } elseif ($character == "blackMirror") {
        $nerd["cs"]++;
    }

    // 2. how much sleep
    if (!isset($character)){
        deny(2);
    }
    if ($sleepHours > 6){ 
        $nerd["not"]++;
    } else {
        inc_nerd($nerd);
    }

    // 3 favorite school subject
    if (!isset($skool)){
        deny(3);
    } else {
        $nerd[$skool]++;
    }

    // 4. favorite equation
    if (!isset($equation)){
        deny(4);
    } else {
        $nerd[$equation]++;
    }

    // 5: youtube subs
    if (!isset($youtube)){
        deny(5);
    } else{
        $nerd[$youtube]++;
    }

    // 6: social media
    if ($socialMedia == "a lot"){
        $nerd["not"] += 2;
    } elseif ($socialMedia == "more than 30"){
        $nerd["not"]++;
    } elseif ($socialMedia == "a little"){
        $nerd = inc_nerd($nerd);
    } elseif ($socialMedia == "what"){
        $nerd = inc_nerd($nerd, 2);
    }
    else { // if the option is not in the list (validation)
        deny(6);
    }

    // 7 sports
    if ($sports == "on"){
        $nerd["not"]++;
        // if it doesn't exist, it means the user didn't check the box
    } elseif (!isset($sports)){
        $nerd = inc_nerd($nerd);
    } else {
        deny(7);
    }

    // 8 introvert or not
    if ($projects == "group"){
        $nerd["not"]++;
    } elseif ($projects == "individual") {
        $nerd = inc_nerd($nerd);
    } else {
        deny(8);
    }

    // 9 fashion sense
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
    } else {
        deny(9); // validation
    }

    // 10 workspace
    if ($workspace == "organized"){
        $nerd["math"]++;
        $nerd["cs"]++;
    } elseif ($workspace == "experiment"){
        $nerd["chem"]++;
        $nerd["physics"]++;
    } elseif ($workspace == "art"){
        $nerd["lit"]++;
    } elseif ($workspace == "tech"){
        $nerd["cs"]++;
    } elseif ($workspace == "books"){
        $nerd["lit"]++;
        $nerd["history"]++;
    } elseif ($workspace == "dump"){
        // increase the highest nerd there is
        $nerd[highest($nerd)]++;
    } else {
        deny(10); // validation
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

    echo "<div class='results'>";
    if ($fullName[$highest] == "Not a nerd"){
        echo "<h1>You are not a nerd?!!</h1>";
        echo '<img src="https://mystickermania.com/cdn/stickers/school/i-am-not-a-nerd-i-am-just-smarter-than-you-512x512.png" alt="not a nerd??" width="200">';
    } else {
        echo "<h1>You are a ". htmlspecialchars($fullName[$highest]) . " nerd!</h1>";
        echo '<img src="../nerd.jpg" alt="NERRRRD!!!" width="200" id="nerdImage">';
    }
    
    
    echo '<br><br><table>';
    echo '<tr><th>Nerd type</th><th>Amount of nerd</th></tr>';
    // displays the nerd
    foreach ($nerd as $key => $value) {
        if ($value != ""){
            if ($highest == $key){ // if the element is the highest one
                echo '<tr class="highlight"><td>' . htmlspecialchars($fullName[$key]) . '</td><td>' . htmlspecialchars($value) . '</td></tr>';
            } else {
                echo '<tr><td>' . htmlspecialchars($fullName[$key]) . '</td><td>' . htmlspecialchars($value) . '</td></tr>';
            }
        }    
            
        
    }
    echo '</table>';
    
    
    // user info validation
    if ($_POST["name"] == "" || $_POST["age"] == "" || $_POST["address"] == "" || $_POST["color"] == ""){
        deny("information");
    }
    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) !== false){
        deny("email");
    }

    // user information
    $user = array(
        "name" => $_POST["name"],
        "age" => $_POST["age"],
        "email" => $_POST["email"],
        "address" => $_POST["address"],
        "color" => $_POST["color"],
    );

    if (isset($_POST["gender"])){
        $user["gender"] = $_POST["gender"];
    } else {
        deny("gender");
    }

    echo "<h2>Here is the information you gave about yourself:</h2>";

    // prints out the user information, making the first letter capital and a colon
    echo '<table>';
    echo "<tr><th>User info</th><th> </th></tr>";

    // htemlspecialchars!!!!!!!
    foreach ($user as $key => $value) {
        if ((!isset($value)) || $value == ""){
            echo '<tr><td>' . ucfirst(htmlspecialchars($key)) . ':</td><td>' . 'None given!' . '</td></tr>';
        } else {
            echo '<tr><td>' . ucfirst(htmlspecialchars($key)) . ':</td><td>' . htmlspecialchars($value) . '</td></tr>';
        }
    }
    echo '</table>';
    echo "</div>"; // end of the <div class="results">
    
    ?>

    <?php require_once("footer.php"); ?>
    
</body>
</html>