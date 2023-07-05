<!-- the form file that goes to this doesn't exist. just check out the notes video -->

<p>
    <?php

    // checks if a variable exists or not
    if(isset($_POST["sword"])){
        echo "you have a sword!";

        $swords = array("life", "summoning", "fire", "among us");
        if (in_array($_POST["sword"], $swords)){
            echo "no cap that's fire bro!!! keep up the drip my g";
        } else{
            echo "You seem to have a crappy sword. L + ratio + don't care + you fell off";
        }
    }

    

    ?>
</p>