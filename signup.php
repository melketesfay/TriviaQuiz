<?php

include_once("components/header.php");



?>

<body>


    <header>

        <div class="container">
            <h1>Trivia Quiz</h1>
            <p>sign up!</p>
        </div>
    </header>



    <main>
        <div class="container">
            <?php if (isset($_SESSION['credentialErrors']['created'])) {
                echo "<h2 class='success'>" . $_SESSION['credentialErrors']['created']  . "</h2>";
            }

            ?>





            <form action="./auth/create.php" method="POST">

                <label for="username">username</label>
                <input type="text" name="username" id="username">
                <?php if (isset($_SESSION['credentialErrors'])) {
                    echo "<p class='error'>" . $_SESSION['credentialErrors'][0]  . "</p>" ?? '';
                    echo "<p class='error'>" . $_SESSION['credentialErrors'][4]  . "</p>" ?? '';
                }  ?>


                <label for="email">e-mail</label>
                <input type="email" name="email" id="email">
                <?php if (isset($_SESSION['credentialErrors'])) {
                    echo "<p class='error'>" . $_SESSION['credentialErrors'][2]  . "</p>" ?? '';
                    echo "<p class='error'>" . $_SESSION['credentialErrors'][5]  . "</p>" ?? '';
                }  ?>

                <label for="password">password</label>
                <input type="password" name="password" id="password">
                <?php if (isset($_SESSION['credentialErrors'])) {
                    echo "<p class='error'>" . $_SESSION['credentialErrors'][1]  . "</p>" ?? '';
                }  ?>
                <input type="submit" value="sign up" name="create">
            </form>
            <a href="index.php">log in</a>

        </div>
    </main>

</body>
<?php echo '<script src="assets/js/script.js"></script>';


$_SESSION['credentialErrors'][0] = "";
$_SESSION['credentialErrors'][1] = "";
$_SESSION['credentialErrors'][2] = "";
$_SESSION['credentialErrors'][4] = "";
$_SESSION['credentialErrors'][5] = "";
$_SESSION["credentialErrors"]['created'] = "";



include_once 'components/footer.php';
?>

</html>