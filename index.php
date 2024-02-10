<?php
if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}

include_once "database/pdoConnection.php";
include_once 'components/header.php';

global $dbConn;

$query = "SELECT * FROM users";
$query = $dbConn->prepare($query);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($result);
var_dump($_SESSION['credentialErrors']);
var_dump($_SESSION);
echo "<br>";

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
        <?php echo "<p>" . $_SESSION['credentialErrors'][0] ?? '' . "</p>"; ?>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <?php echo "<p>" . $_SESSION['credentialErrors'][1] ?? '' . "</p>"; ?>
        <input type="submit" value="login" name="submit">
    </form>

</body>
<?php echo '<script src="assets/js/script.js"></script>';







?>

</html>