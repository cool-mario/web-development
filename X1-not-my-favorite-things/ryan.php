<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        tr, td {
            border: 1px solid black;
        }

    </style>
    
    <title>Ryan's favorite things</title>
</head>
<body>
    <h1>Ryan's favorite things!!!!!</h1>    
    
    <?php

        $fav_computer = ["java programming language", "windows OS", "opera web browser"];
        $fav_color = ["purple", "indigo", "maroon", "idk"];
        $fav_school_sub = ["math", "science", "band"];

        array_push($fav_school_sub, "english"); // add to the array

        unset($fav_color[3]);  // delete something extra from the array with the index
    ?>
        
    <h3>Computer Stuff</h3>
    <table>
        <?php
            // a table!!!!!!
            for ($i = 0; $i < count($fav_computer); $i++){
                echo "<tr><td>" . $fav_computer[$i] . "</td></tr>\n";
            }
        ?>
    </table>
        
    <h3>Colors</h3>
    <form>
        <?php
        for ($i = 0; $i < count($fav_color); $i++){
            echo "<input type=\"radio\" id=\"$fav_color[$i]\" name=\"form\">";
            echo "<label for=\"$fav_color[$i]\">" . $fav_color[$i] . "</label><br>";
        }
        ?>
    </form>

    

    <h3>School subjects</h3>
    <ul>
        <?php
        for ($i = 0; $i < count($fav_school_sub); $i++){
            echo "<li>" . $fav_school_sub[$i] . "</li>\n";
        }
        ?>
    </ul>
        
    
</body>
</html>


<!-- Favorites:

    computer stuff: java, windows, opera web browser

    Colors: purple, indigo, maroon

    school subj: math, science, band 


    

 -->