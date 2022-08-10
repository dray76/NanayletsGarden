<?php

if (isset($_POST["regsubmit"])) {

    $email = $_POST["email"];
    $username = $_POST["uid"];
    $address = $_POST["address"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php'; 
    require_once 'functions.inc.php';

    if (epmtyInputSignup($email, $username, $address, $pwd, $pwdRepeat) !== false) {
        header("location: ../LogReg.php?regerror=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../LogReg.php?regerror=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../LogReg.php?regerror=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../LogReg.php?regerror=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../LogReg.php?regerror=usernametaken");
        exit();
    }
    
    createUser($conn, $email, $username, $address, $pwd);
}
else {
    header("location: ../LogReg.php");
    exit();
}