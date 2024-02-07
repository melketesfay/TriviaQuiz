<?php

// include_once '../components/header.php';

if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}
include_once '../database/pdoConnection.php';
$DBCONN = $dbConn;


if (isset($_POST["submit"])) {

    $_SESSION['login-try'] = true;

    if (strlen($_POST["username"]) < 5 || strlen($_POST["password"]) < 8) {
        if (strlen($_POST["username"]) < 5 && strlen($_POST["password"]) < 8) {
            $_SESSION["error_login_username_length"] = '<p id="error">username should be atleast 5 charachters</p>';
            $_SESSION["error_login_password_length"] = '<p id="error">Password should be atleast 8 charachters</p>';
            header('Location:../index.php');
        } elseif (strlen($_POST["username"]) < 5) {
            $_SESSION["error_login_username_length"] = '<p id="error">username should be atleast 5 charachters</p>';
            header('Location:../index.php');
        } elseif (strlen($_POST["password"]) < 8) {
            $_SESSION["error_login_password_length"] = '<p id="error">Password should be atleast 8 charachters</p>';
            header('Location:../index.php');
        }
    } elseif (strlen($_POST["username"]) >= 5 || strlen($_POST["password"]) >= 8) {
        if (session_status() === PHP_SESSION_NONE) {
            // Starte die Session
            session_start();
        }
        $_SESSION["error_login_username_length"] = "";
        $_SESSION["error_login_password_length"] = "";
        $loginUser = $_POST["username"];
        $loginPass = $_POST["password"];
        login($loginUser, $loginPass);
    }
} else {
    $_SESSION['login-try'] = false;
    $_SESSION["error_login_username_length"] = "";
    $_SESSION["error_login_password_length"] = "";
    session_unset();
    session_destroy();
}




// Test POST returns username and password
// echo "<pre>" . "<br>" . $loginUser . "<br>" . $loginPass;


function login($username, $password)

{

    if ($username !== "" && $password !== "") {
        try {

            $testUser = "SELECT * FROM users WHERE name=:username LIMIT 1";


            $userExists = $GLOBALS['DBCONN']->prepare($testUser);

            $userExists->bindParam(':username', $username);

            $userExists->execute();

            $user = $userExists->fetchAll(PDO::FETCH_ASSOC);




            if ($user[0]['name'] == $username && $user[0]['password'] == $password) {
                $_SESSION["name"] = $username;
                header('Location:../welcome.php');

                return true;
            } else {
                header('Location:../index.php');
                return false;
            }
        } catch (\PDOException $error) {
            header('Location:../index.php');
            echo "Query Error" . $error->getMessage();
        }
    }


    header('Location:../index.php');
}
