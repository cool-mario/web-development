<!DOCTYPE html>
<head>
    <style>
        p {
            font-size: 30px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <?php
        // this is the post request!
        var_dump($_POST); //super global array!!!!!!!! O_O a variable that is in all scopes

        $name = $_POST["user"]; // save the name that the user put in the form

        if($name == "Joe"){
            echo "<p> Joe mama!!!</p>";
        } 
        // name is a string, and can still be compared with an int!!
        elseif($name == 111){
            echo "<p>0101010101</p>";
        }

        // triple equals === means the type also has to be the same 
        elseif($name === 111){
            echo "<p>what?!</p>";
        }
        else {
            echo "<p>Hi $name!</p>";
            echo "<p>Hi " . htmlspecialchars($name) . "!</p>"; // make it so if the user puts sus code it won't be executed. docs say "Convert special characters to HTML entities"
        }
        // data casting: (int) (string)
    ?>
</body>
</html>

