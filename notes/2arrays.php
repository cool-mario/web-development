<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style></style>
    <title>Document</title>
</head>
<body>
    <a href="https://canvas.instructure.com/courses/6832419/assignments/37475045?module_item_id=85344666">Lecture on php arrays</a>
    <?php

        $sandwhich = ["wheat", "mustard", "lettuce"];   // array() also works 
        echo "<p>{$sandwhich[0]}</p>";  // use {} to concatenate better without more """""""

        $sandwhich[1] = "mayo";
        $sandwhich[] = "idk something"; // add something to the end of the array

        var_dump($sandwhich); // see array information

        $ingCount = count($sandwhich);
        echo "<br># of ingrediendts: {$ingCount}";

        echo "<ol>";
        for($i = 0; $i < count($sandwhich); $i++){ // loop thru list for loop
            echo "<li>{$sandwhich[$i]}</li>";
        }
        echo "</ol>";


        echo "<ol>";
        foreach ($sandwhich as $thing){ // for each loop! much better
            echo "<li>{$thing}</li>";
        }
        echo "</ol>";

        // Associative arrays! (a dictionary?)
        $fav["game"] = "minecraft";
        $fav["fruit"] = "strawberry";
        $fav["desert"] = "tiramisu";
        var_dump($fav);

        foreach($fav as $key => $value){ // for each loop with key and value
            echo "<p>My favorite {$key} is {$value}</p>";
        }

    ?>

</body>
</html>