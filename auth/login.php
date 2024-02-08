<?php
if (session_status() === PHP_SESSION_NONE) {
    // Starte die Session
    session_start();
}


include_once '../database/pdoConnection.php';
include_once '../components/header.php';




if (isset($_POST["submit"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!validateUsername($_POST['username']) || !validatePassword($_POST['password'])) {
        if (!validateUsername($_POST['username'])) {
            $_SESSION['credentialErrors'][0] = "Username must be at least 5 Chars(a-Z0-9_-)";
        }
        $_SESSION['credentialErrors'][1] = "password must be at least 8 Chars and must include (a-zA-Z0-9#?&/)";
        return false;
    }

    login($_POST['username'], $_POST['password']);
}




// Test POST returns username and password
// echo "<pre>" . "<br>" . $loginUser . "<br>" . $loginPass;


function login($username, $password)
{

    global $dbConn;

    try {

        $testUser = "SELECT * FROM users WHERE name=:username";
        $userExists = $dbConn->prepare($testUser);
        $userExists->bindParam(':username', $username);
        $userExists->execute();
        $user = $userExists->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        print_r($user);
        echo "</pre>";
    } catch (\PDOException $error) {

        echo "Query Error" . $error->getMessage();
    }
}



//username must be at  least 5 chars and can contain alphanumerics and -
function validateUsername($username)
{
    $regex = '/[^a-zA-z0-9_-]/';


    if (preg_match($regex, $username) || strlen($username) < 5) {
        echo "username not valid";
        return false;
    }

    echo "valid username<br>";
    return true;
}




function validatePassword($password)
{
    // check for at least 8 chars must contain (capital letters, small letters,numbers,&/#-?)

    $regex = "/((?=\w{7,})(?=\D*\d+))(?=\d*\w*[A-Z]+)(?=\d*\w*[a-z]+)(?=\d*\w*[#-&\/?]+)/";

    $regex = "/(?=(\w|\W){7,})(?=\D*\d+)(?=\d*\w*\W*[A-Z]+)(?=\d*\w*\W*[a-z]+)(?=\w*\d*\W+)/";


    if (!preg_match($regex, $password)) {
        echo "password not safe<br>";
        return false;
    }
    echo "password safe";
    return true;
}

validatePassword("aaa&aaA1sds");
