<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation stuff</title>
</head>
<body>
    <p>
        <?php
        // backend validation if the email is correct
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) !== false) {
            echo htmlspecialchars($_POST["email"]);

        } else {
            echo "ur email sux bro no cap";
        }
        
        ?>
    </p>
</body>
</html>