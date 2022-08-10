<?php
    include 'Header.php';
?>

<?php
    if (!isset($_SESSION["useruid"])) {
        header("location: ../HomePage.php");
        exit();
    }
    if (isset($_SESSION["useruid"])) {
        if ($_SESSION["useruid"] !== "Admin") {
            header("location: ../HomePage.php");
            exit();
        }
    }
?>
    <by>
        <div class="parent">     

            <div class="inner-container">
                <?php
                    include 'Navbar.php';
                    include 'includes/adminorder.inc.php'
                ?>
                <div class="child-container">
                    <div class="to-deliver">
                        <table id="table" class="ordertable" border="1" cellpadding="0">
                            <tr id="first-tr">
                                <th>Order ID</th>
                                <th>Ordered Item</th>
                                <th>Total Price</th>
                                <th>Customer</th>
                                <th>Date Ordered</th>
                                <th>Address</th>
                                <th>Done</th>
                            </tr>

                            <?php
                                $num=mysqli_num_rows($query);
                                if ($num>0) {
                                    while ($result=mysqli_fetch_assoc($query)) {
                                        echo "
                                        <tr>
                                            <td>".$result['ordersId']."</td>
                                            <td>".$result['ordersItem']."</td>
                                            <td>".$result['ordersPrice']."</td>
                                            <td>".$result['ordersUser']."</td>
                                            <td>".$result['ordersDate']."</td>
                                            <td>".$result['ordersAddrs']."</td>
                                            <td> 
                                                <input type='checkbox' class='btn-orderdone' name='select'>
                                            </td>
                                        </tr>
                                        ";
                                    }
                                }
                            ?>

                            
                        </table>
                            
                    </div>
                </div>
            </div>
                
            
        </div>
    </body>
</html>