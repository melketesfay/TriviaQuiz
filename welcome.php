<?php

if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}
if (!isset($_SESSION['username'])) {
    header('location: index.php');
    return false;
}
include_once "database/pdoConnection.php";
include_once 'components/header.php';


function GoToResults()
{
    echo htmlspecialchars($_SERVER["PHP_SELF"]);
}

?>

<body>
    <!-- <p>
        When \(a \ne 0\), there are two solutions to \(ax^2 + bx + c = 0\) and
        they are \[x = {-b \pm \sqrt{b^2-4ac} \over 2a}.\]
    </p> -->

    <h1>Welcome <?php echo $_SESSION['username']; ?></h1>




    <form action="quiz.php" method="get">

        <input type="submit" value="Start Quiz">



    </form>

    <form action="auth/logout.php" method="get">
        <button type="submit">log out</button>
    </form>

</body>



<?php
include_once 'components/footer.php';
?>

</html>