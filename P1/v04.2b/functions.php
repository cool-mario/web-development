<?php

    // prints out a neat array
    function print_array($thing, $key = "Key", $value = "Value"){
        echo '<table>';
        echo "<tr><th>$key</th><th>$value</th></tr>";
    
        // htmlspecialchars!!!!!!!
        foreach ($thing as $key => $value) {
            echo '<tr><td>' . htmlspecialchars($key) . '</td><td>' . htmlspecialchars($value) . '</td></tr>';
        }
        echo '</table>';
    }

    // increases all the nerd levels except for not a nerd
    function inc_nerd($nerd, $number = 1){
        // print_array($nerd); // used for debugging
        echo "<br>";
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

    // says "You didn't input your XXX correctly!!! OwO"
    // and then dies 
    // if label is a word, then it's the user input
    // if label is a int, then it's one of the question problems
    // this makes it so that the user knows what went wrong
    function deny($label){
        $label = htmlspecialchars($label);
        if (gettype($label) === "string"){
            echo '<h2 class="error">You didn\'t input your ' . $label . ' correctly!! (¬_¬)</h2>';

        } elseif (gettype($label) === "integer") {
            echo '<h2 class="error">You didn\'t answer question ' . $label . ' as intended!! ಠ_ಠ</h2>';
            
        }
        // shows a link to go back, and ends the code
        echo '<a href="test.php" class="error">Go back!!</a>';
        
        require_once("footer.php");
        die(); // die.
    }

?>