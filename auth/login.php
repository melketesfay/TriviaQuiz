<?php

// include_once '../components/header.php';
include_once '../database/pdoConnection.php';
if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}

$DBCONN = $dbConn;


if (isset($_POST["submit"])) {
    $loginUser = $_POST["username"];
    $loginPass = $_POST["password"];
}



// Test POST returns username and password
// echo "<pre>" . "<br>" . $loginUser . "<br>" . $loginPass;


function login($username, $password)

{


    try {

        $testUser = "SELECT *, COUNT(#) AS num FROM users WHERE name=:username ";


        $userExists = $GLOBALS['DBCONN']->prepare($testUser);

        $userExists->bindParam(':username', $username);
        // $userExists->bindParam(':password', $password);

        $userExists->execute();

        $user = $userExists->fetchAll(PDO::FETCH_ASSOC);
        var_dump($user);

        if ($user[0]['name'] == $username && $user[0]['password'] == $password) {
            $_SESSION["name"] = $username;
            header('Location:../welcome.php');

            return true;
        } else {
            header('Location:../index.php');
            return false;
        }
    } catch (\PDOException $error) {
        echo "Query Error" . $error->getMessage();
        header('Location:../index.php');
    }
}


login($loginUser, $loginPass);
