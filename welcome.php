<?php

if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}

include_once "database/pdoConnection.php";
include_once "components/header.php";

var_dump($resultfinl);
echo "<br>";

for ($i = 0; $i < 10; ++$i) {
    $j = $i++;
    print_r($i . " " . $j . "\n");
}

?>




<body>


    <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
</body>

</html>