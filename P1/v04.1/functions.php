<?php

    // prints out a neat array
    function print_array($thing, $key = "Key", $value = "Value"){
        echo '<table>';
        echo "<tr><th>$key</th><th>$value</th></tr>";
    
        foreach ($thing as $key => $value) {
            echo '<tr><td>' . htmlspecialchars($key) . '</td><td>' . htmlspecialchars($value) . '</td></tr>';
        }
        echo '</table>';
    }

    // increases all the nerd levels except for not a nerd
    function inc_nerd($nerd, $number = 1){
        // print_array($nerd); // used for debugging
        echo "<br>";
        $nerd["chem"]+=$number;
        $nerd["math"]+=$number;
        $nerd["chem"]+=$number;
        $nerd["cs"]+=$number;
        $nerd["physics"]+=$number;
        $nerd["lit"]+=$number;
        return $nerd;
    }

    // returns the highest key of the nerd, takes in array
    function highest($nerd){
        // sort it so that highest is first (nerd doesn't change tho because this is in a function)
        arsort($nerd);
        return key($nerd); // the key with the highest value    
    }

?>