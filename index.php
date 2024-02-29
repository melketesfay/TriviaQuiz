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

// echo "<pre>";
// var_dump($result);
// var_dump($_SESSION['credentialErrors']);
// var_dump($_SESSION);
// echo "<br></pre>";

?>


<body>




    <header>
        <div class="container">
            <h1>TriviaQuiz</h1>
            <p>Please sign in or create an account to start!</p>
        </div>
    </header>


    <main>
        <div class="container">
            <form action=" auth/login.php" method="POST">
                <?php if (isset($_SESSION['credentialErrors'][3])) {
                    echo "<p class='error'>" . $_SESSION['credentialErrors'][3]  . "</p>" ?? '';
                }

                ?>
                <label for="username">username</label>
                <input type="text" name="username" id="username">
                <?php //echo "<p class='error'>" . $_SESSION['credentialErrors'][0]  . "</p>"; 
                ?>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
                <?php //echo "<p class='error'>" . $_SESSION['credentialErrors'][1] . "</p>"; 
                ?>
                <input type="submit" value="login" name="submit">
            </form>
            <a href="signup.php">Don't have an account yet? sign up now!</a>
        </div>
    </main>



</body>
<?php echo '<script src="assets/js/script.js"></script>';


// $_SESSION['credentialErrors'][0] = "";
// $_SESSION['credentialErrors'][1] = "";
$_SESSION['credentialErrors'][3] = "";


include_once 'components/footer.php';
?>



</html>