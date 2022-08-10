<?php

session_start();

if (isset($_GET["ordersubmit"])) {

    if ($_GET["ordplant"] == null || $_GET["ordquant"] == null) {
        header("location: ../OrderPage.php?ordererror=emptycart");
        exit();
    }
    date_default_timezone_set('Asia/Taipei');
    
    $ordItems = $_GET[["ordplant"][0]];
    $ordQuantity = $_GET[["ordquant"][0]];
    $totalPrice = $_GET["ordtotal"];
    $ordUser = $_SESSION["useruid"];
    $ordAddrs = $_SESSION["useraddress"];
    $ordDate = date('m/d/Y h:ia');

    //combine items and quantity
    $length = count($ordQuantity);
    $combine = array();
    for ($i = 0; $i < $length; $i++) {
      if ($ordQuantity[$i] !== "") {
        $quantitem = $ordItems[$i] . "x" . $ordQuantity[$i];
        array_push ($combine, $quantitem);
      }
    }

    $ordItems = $combine;
    
    $ordItems = implode(", ", $ordItems);

    require_once 'dbh.inc.php'; 
    require_once 'functions.inc.php';

    //useless - padelete nlng 
    if (emptycart($ordItems, $totalPrice, $ordUser, $ordDate, $ordAddrs) !== false) {
        header("location: ../OrderPage.php?ordererror=emptycart");
        exit();
    }
    
    placeOrder($conn, $ordItems, $totalPrice, $ordUser, $ordDate, $ordAddrs);
}
else {
    header("location: ../OrderPage.php?");
    exit();
}