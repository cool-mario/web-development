<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import style sheet -->
    <link rel="stylesheet" href="style.css">
    <!-- import jQuery and my own JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script src="cool.js"></script>
    <title>The Nerd Test</title>
</head>
<body>

    <?php require_once("header.php");?>
    
    <p>which one r u?</p>

    <h2>Instructions</h2>
    <p>
        Answer these interesting questions. When you submit, you'll find out what type of nerd you most likely are! 
    </p>

    <hr><br><br>

    <form action="results.php" method="post">

        <!-- user's personal information -->
        <div class="pretest">
            <h3>First, we would like some information about you:</h3>
            <p>What's your name?</p>
            <input type="text" name="name" required>

            <p>What's your age?</p>
            <input type="number" name="age" min="0" max="122" required>

            <p>Email?</p>
            <input type="email" name="email" required>

            <p>What is your favorite color? (click on the box or circle to select your color) <span id="colorsecret">(now look at the top of this page!)</span></p>
            <input type="color" name="color" value="#FFA500">
            

            <p>What is your address?</p>
            <input type="text" name="address" required>


            <p>What's your gender?</p>
            <input type="radio" name="gender" id="female" value="female" required>
            <label for="female">Female</label><br>
            <input type="radio" name="gender" id="male" value="male">
            <label for="male">Male</label><br>
            <input type="radio" name="gender" id="idk" value="idk">
            <label for="idk">idk bro</label><br>
            <input type="radio" name="gender" id="walmart_bag" value="walmart_bag">
            <label for="walmart_bag">Walmart bag</label><br>
            <br>
            <button type="button" id="pretestButton">On to the test!</button>
            <br><br>

        </div>
        
        <!-- the value and name is for the post -->

        <!-- character -->
        <div>
            <p>1. Which TV show/movie do you like the most?</p>
            <input type="radio" name="character" id="walter_white" value="walter_white" required>
            <label for="walter_white">Breaking Bad</label><br>
            <input type="radio" name="character" id="sheldon" value="sheldon">
            <label for="sheldon">The Big Bang Theory</label><br>
            <input type="radio" name="character" id="harry" value="harry">
            <label for="harry">Harry Potter</label><br>
            <input type="radio" name="character" id="blackMirror" value="blackMirror">
            <label for="blackMirror">Black Mirror</label><br>
        </div>

        <!-- sleep -->
        <div>
            <p>2. How many hours of sleep do you get on average?</p>
            <input type="number" name="sleepHours" value="" min="0" max="24" required><br>
        </div>

        <!-- skool -->
        <div>
            <p>3. What's your favorite class? (or one you most want to take)</p>
            <input type="radio" name="skool" id="APchem" value="chem" required>
            <label for="APchem">Chemistry</label><br>
            <input type="radio" name="skool" id="APcalc" value="math">
            <label for="APcalc">Calculus</label><br>
            <!-- remove? -->
            <input type="radio" name="skool" id="APphysics" value="physics">
            <label for="APphysics">Physics</label><br>
            <input type="radio" name="skool" id="APCSA" value="cs">
            <label for="APCSA">Computer Science</label><br>
            <input type="radio" name="skool" id="APlang" value="lit">
            <label for="APlang">Language or Literature</label><br>
            <!-- <input type="radio" name="skool" id="APUSH" value="history">
            <label for="APUSH">US history or AP Euro</label><br> -->
            <input type="radio" name="skool" id="none" value="not">
            <label for="none">I just want my lunch</label><br>
        </div>

        <!-- equation -->
        <div>
            <p>4. What's your favorite equation?</p>
            <input type="radio" name="equation" id="chemistry" value="chem" required>
            <label for="chemistry">C<sub>6</sub>H<sub>12</sub>O<sub>6</sub> + 6O<sub>2</sub> → 6CO<sub>2</sub> + 6H<sub>2</sub>O + Energy</label><br>
            
            <input type="radio" name="equation" id="math" value="math">
            <label for="math">e<sup>iπ</sup> + 1 = 0</label><br>
            
            <input type="radio" name="equation" id="physics" value="physics">
            <label for="physics">F = ma</label><br>
            
            <input type="radio" name="equation" id="EZ" value="not">
            <label for="EZ">1+1=3</label><br>
            <input type="radio" name="equation" id="english" value="lit">
            <label for="english">Independent Clause + Conjunction + Independent Clause = Compound Sentence</label><br>
            <input type="radio" name="equation" id="CS" value="cs">
            <label for="CS">!(A && B) == !A || !B </label><br>
        </div>

        <!-- youtube channel -->
        <div>
            <p>5. Which Youtube channel do you watch the most?</p>
            <input type="radio" name="youtube" id="3b1b" value="math" required>
            <label for="3b1b">3Blue1Brown</label>
            
            <input type="radio" name="youtube" id="NileRed" value="chem">
            <label for="NileRed">NileRed</label>
            
            <input type="radio" name="youtube" id="MarkRober" value="physics">
            <label for="MarkRober">Mark Rober</label>
            
            <input type="radio" name="youtube" id="MrBeast" value="not">
            <label for="MrBeast">Mr Beast</label>
            
            <input type="radio" name="youtube" id="FireShip" value="cs">
            <label for="FireShip">FireShip</label>
            <br><br>
        </div>
        

        <!-- Social media -->
        <div>
            <p><label for="socialMedia">6. How many people follow you on social media? (like youtube, instagram, etc)</label></p>
            <select name="socialMedia" id="socialMedia">
                <option value="---">click for dropdown!</option>
                <option value="a lot">Like more than 100 people!</option>
                <option value="more than 30">More than 30!</option>
                <option value="a little">A few people</option>
                <option value="what">Wait, whats social media?? why are people following me?!</option>
            </select>
        </div>

        <!-- sports -->
        <div>
            <p>7. Are you on a sports team?</p>
            <input type="checkbox" name="sports">
        </div>

        <!-- introvert -->
        <div>
            <p>8. Do you like individual projects or group projects?</p>
            <input type="radio" name="projects" id="individual" value="individual" required>
            <label for="individual">Individual projects</label>
            <input type="radio" name="projects" id="group" value="group">
            <label for="group">Group projects</label>
        </div>

        <!-- fashion -->
        <div>
            <p>9. How much time do you spend picking out your clothes for the day?</p>
            <select name="pickClothes">
                <option value="---">click for dropdown!</option>
                <option value="barely">0.0024351 nanoseconds</option>
                <option value="zero">I just wear the same shirt everyday so 0 seconds</option>
                <option value="a few">A few minutes or more comparing clothes</option>
                <option value="a lot">I spend a ton of time! Gotta look good bro</option>
                <option value="1min">just 1 minute</option>
            </select>
        </div>

        <!-- workspace -->
        <div>
            <p>10. What is your ideal workspace?</p>
            <input type="radio" name="workspace" id="organized" value="organized" required>
            <label for="organized">Organized and neat</label><br>

            <input type="radio" name="workspace" id="experiment" value="experiment">
            <label for="experiment">Full of experimental gadgets that you made</label><br>

            <input type="radio" name="workspace" id="dump" value="dump">
            <label for="dump">A total garbage dump</label><br>

            <input type="radio" name="workspace" id="art" value="art">
            <label for="art">color and filled with artwork to inspire you</label><br>

            <input type="radio" name="workspace" id="tech" value="tech">
            <label for="tech">2 monitor setup with a custom PC and rainbow LEDs</label><br>

            <input type="radio" name="workspace" id="books" value="books">
            <label for="books">Filled with history books</label><br><br><br>
        </div>

        
        <div><input type="submit" value="Submit"></div>

    </form>


    <?php require_once("footer.php");?>

</body>
</html>


