<!-- SQL query to drop your tables -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installing database stuff for parkamon</title>
</head>
<body>
<?php

// file_get_contents documentation: https://www.php.net/manual/en/function.file-get-contents.php
// PDO->exec() documentation https://www.php.net/manual/en/pdo.exec.php

require_once "../X9-The-Chalkboard-Manifesto/config.php";
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $query = file_get_contents('parkamon.sql');
    $dbh->exec($query);
    echo "<p>Successfully installed databases</p>";
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

?>    
</body>
</html>