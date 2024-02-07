<?php

if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}

include_once "database/pdoConnection.php";
include_once 'components/header.php';

// echo "<pre>";
// var_dump($resultfinl);
// echo "<br>";
// echo readfile(__FILE__);
// echo "</pre>";


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
    <h2>test</h2>
</body>

</html>