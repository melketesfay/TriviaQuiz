<?php

if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}

include_once "database/pdoConnection.php";

var_dump($resultfinl);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
</body>

</html>