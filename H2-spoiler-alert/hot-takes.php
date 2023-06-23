<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        td {
            background-color: aliceblue;
            padding: 10px;
        }
        /* <td class="hottest"> <td> */
        tr.hottest > td { 
            background-color: orangered;
            color: yellow;
        }
    </style>

    <title>H2: Spoiler Alert</title>
</head>
<body>
    <h2>H2: Spoiler Alert</h2>
    <br>

    <?php
        // associative array!
        $hot_takes["Terraria"] = "basically 2D minecraft";
        $hot_takes["The Mario movie"] = "a certified Chris pratt moment";
        $hot_takes["College Board"] = "A corrupt company that has a monopoly and steals all your money (fire!)";
        $hot_takes["Spider-Man: Across the Spider-Verse"] = "Haven't even watched it yet lol";
        $hot_takes["A Youtube"] = "The ultimate distraction from homework";
        $hot_takes["Tik Toc"] = "hot take: very cringe and it sucks";
        $hot_takes["Apple vision pro"] = "funny looking ski goggles that cost way too much";
        $hot_takes[""]

        // var_dump($hot_takes);

        uksort($hot_takes, "compare"); // sort array into alphabetical order, User defined comparison function!

        echo "<table>";

        foreach($hot_takes as $name => $spoiler){ // loop thru each key value pair
            if (str_contains($spoiler, "fire") || str_contains($spoiler, "hot")){ // check for fire!!!!!
                echo "<tr class=\"hottest\">"; 
            } else {
                echo "<tr>";  
            }
            echo "<td>$name</td>";
            echo "<td>" . str_rot13($spoiler) . "</td>"; // encode value in rot13
            
            echo "</tr>";
        }
        echo "</table>";

        // user defined comparison
        function compare($s1, $s2){
            $s1 = removeWord($s1); // remove the words, then compare
            $s2 = removeWord($s2);
            // echo "<p>s1: $s1   s2: $s2 </p>"; // debugging
            return strcmp($s1, $s2);
        }

        // remove the extra words at the beginning
        function removeWord($str){
            if (str_starts_with($str, "the ") || str_starts_with($str, "The ")){
                return substr($str, 4); // remove the "the"
            } elseif (str_starts_with($str, "a ") || str_starts_with($str, "A ")){
                return substr($str, 2); // remove the "a"
            } elseif (str_starts_with($str, "an ") || str_starts_with($str, "An ")){
                return substr($str, 3); // remove the "a"
            } else {
                return $str;
            }
        }

    ?>
</body>
</html>

<!-- assignment link: https://canvas.instructure.com/courses/6832419/assignments/37475043 -->