<?php

$serverName = "sql108.epizy.com"; //localhost
$dBUsername = "epiz_31210536"; //root
$dBPassword = "0HCwAQaPw6CoH";
$dBName = "epiz_31210536_nanaygarden"; //nanaygarden

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}