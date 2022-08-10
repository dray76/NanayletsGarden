<?php

include 'dbh.inc.php';

$select="SELECT * FROM orders ORDER BY ordersId DESC";
$query=mysqli_query($conn, $select);
