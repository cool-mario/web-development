<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parkamon dropping tables!!!!</title>
</head>
<body>
<?php

require_once "../X9-The-Chalkboard-Manifesto/config.php";
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $query = file_get_contents('drop.sql');
    $dbh->exec($query);
    echo "<p>Successfully dropped databases!</p>";
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

?>
</body>
</html>
