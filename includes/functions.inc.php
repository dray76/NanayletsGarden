<?php

function epmtyInputSignup($email, $username, $address, $pwd, $pwdRepeat) {
    $result;
    if (empty($email) || empty($username) || empty($address) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//preventing sql injection
function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../LogReg.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;

    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $username, $address, $pwd) {
    $sql = "INSERT INTO users (usersEmail, usersUid, usersAddress, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../LogReg.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $email, $username, $address, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../LogReg.php?regerror=none");
    exit();
}


//login functions

function epmtyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../LogReg.php?logerror=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../LogReg.php?logerror=wronglogin");
        exit();
    }
    
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["useraddress"] = $uidExists["usersAddress"];

        if ($_SESSION["useruid"] == "Admin") {
            header("location: ../Admin.php");
            exit();
        }
        else {
            
            header("location: ../index.php");
            exit();
        }

        
    }
}

function emptyCart($ordItems, $totalPrice, $ordUser, $ordDate, $ordAddrs) {
    $result;
    if (empty($ordItems) || empty ($totalPrice) || empty($ordUser) || empty($ordDate) || empty($ordAddrs)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function placeOrder($conn, $ordItems, $totalPrice, $ordUser, $ordDate, $ordAddrs) {
    $sql = "INSERT INTO orders (ordersItem, ordersPrice, ordersUser, ordersDate, ordersAddrs) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../OrderPage.php?ordererror=orderfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sisss", $ordItems, $totalPrice, $ordUser, $ordDate, $ordAddrs);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../OrderPage.php?ordererror=none");
    exit();
}


