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
        th, td {
            background-color:  rgb(75,73,129);
            padding: 10px;
        }
    </style>

    <title>Document</title>
</head>
<body>
    <?php

    // var_dump($_POST);

    echo '<table>';
    echo '<tr><th>Key</th><th>Value</th></tr>';

    foreach ($_POST as $key => $value) {
        echo '<tr><td>' . htmlspecialchars($key) . '</td><td>' . htmlspecialchars($value) . '</td></tr>';
    }
    echo '</table>';

    $mathNerd = 0;      // math
    $chemNerd = 0;      // Chemistry
    $csNerd   = 0;      // Computer Science
    $historyNerd = 0;   // History
    $engineerNerd = 0;  // Engineer
    $litNerd  = 0;      // Literature Nerd 
    $notANerd = 0;      // not a nerd!

    // get all the post request values
    char = $_POST["character"];
    sleepHour = $_POST["sleepHours"];
    skoolSub = $_POST["skool"];
    


    ?>
    
</body>
</html>