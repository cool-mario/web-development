<?php
require_once "header.php"; // import the header from the other file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        headerThing(); // the header!
    ?>

    <form action="printout.php" method="POST">
            
        <!-- name -->
        <label for="name">Hello! What's your name?</label>
        <input type="text" name="name" id="name" minlength="1" maxlength="69" size="20">
        <br><br>
        <!-- how many AP classes have you taken? (number line input) -->
        <label for="APclasses">How many AP classes have you taken? (number input)</label>
        <input type="number" name="APclasses" min="0" max="38" step="1">
        <br>
        <!-- would you rather stay up to 1 am everyday and finish all your homework, or get a good amount of sleep everyday, but not finish all of your homework?  (checkbox and radio)-->
        <p>Would you rather...<br>
            <input type="radio" name="would_you_rather" id="1am_gang" value="1am_gang">
            <label for="1am_gang">Stay up to 1 AM and finish all of your homework, or...</label><br>
            <input type="radio" name="would_you_rather" id="helth_gang" value="helth_gang">
            <label for="helth_gang">Get a healthy amount of sleep every night, but almost never be able to finish all your homework?</label>
        </p>
        <!-- what are your favorite subjects in school? (check box) Can't get the submit to work tho-->
        <p>What are your favorite subjects at school?<br>
            <input type="checkbox" name="math-type" id="Math" value="Math">
            <label for="Math">Math</label>

            <input type="checkbox" name="english-type" id="english" value="English">
            <label for="english">English</label>

        </p>
        <!-- why did the chicken cross the road? (dropdowm MC) SELECT element!! -->
        <label for="chicken">Why did the chicken cross the road? (drop down)</label>
        <select id="chicken" name="chicken">
            <option value="To get to the other side">To get to the other side</option>
            <option value="To show the squirrel it could be done.">To show the squirrel it could be done.</option>
            <option value="To avoid this joke from being made">To avoid this joke from being made</option>
            <option value="To social distance from you">To social distance from you</option>
            <option value="To get to the loser’s house. Knock, knock! Who’s there? The chicken 💀">To get to the loser’s house. Knock, knock! Who’s there? The chicken 💀</option>
            <option value="bruh why u asking me ask the chicken">bruh why u asking me ask the chicken</option>
            <option value="The grass was greener on the other side.">The grass was greener on the other side.</option>
            <option value="To get to the winner's house. Knock, knock! Who’s there? not the chicken.">To get to the winner's house. Knock, knock! Who’s there? not the chicken.</option>
        </select><br><br>
        <!-- sleep -->
        <label for="sleepytime">What time do you usually go to sleep?</label>
        <input type="time" name="sleepytime" value="01:00">
        <br><br>
        <!-- stupidly hard math question (dropdown MC) -->
        <!-- UwU or OwO? (radio) -->
        <!-- how much rizz? rizzler moment -->

        <label for="AIart">Open Ended question (textarea): <br>Do you think that AI generated art is real art? explain your answer.</label> <br>
        <textarea id="AIart" name="AIart"></textarea><br><br>

        <label for="fightQ">Here's an interesting sitation: You are challeneged to fight with a clone of yourself. The clone will be created an hour before the fight, so anything 1 hour before the clone won't know about, and you can prepare something. <br> How do you defeat yourself? </label> <br>
        <textarea id="fightQ" name="fightQ" required></textarea>

        
        <br>
        <input type="submit" value="Submit!">

    </form>
</body>
</html>