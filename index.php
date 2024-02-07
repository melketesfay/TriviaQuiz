<?php
if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}

include_once "database/pdoConnection.php";
include_once 'components/header.php';

// $path = "/database/pdoConnection.php";
// include $_SERVER['DOCUMENT_ROOT'] . $path;


// echo "<h1>HALLO</h1>";
// $dbName = getenv('DB_NAME');
// echo "DB NAME: $dbName<br>";

// echo $_SERVER['DOCUMENT_ROOT'];







?>


<body>

    <p>hallo</p>



    <p>
        When \(a \ne 0\), there are two solutions to \(ax^2 + bx + c = 0\) and
        they are \[x = {-b \pm \sqrt{b^2-4ac} \over 2a}.\]
    </p>


    <form action=" auth/login.php" method="POST">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <?php

        echo  $_SESSION['error_login_username_length'] ?? "";


        ?>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <?php

        echo $_SESSION['error_login_password_length'] ?? "";

        ?>

        <input type="submit" value="login" name="submit">
    </form>

</body>
<?php echo '<script src="assets/js/script.js"></script>';
$test = "melke";
echo strlen($test);
?>

</html>