<?php
    include 'Header.php';
    include 'includes/dbh.inc.php';
    if (isset($_POST["submit"])) {
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $email = mysqli_real_escape_string($conn, ($_POST["email"]));
        $address = mysqli_real_escape_string($conn, ($_POST["address"]));
        $password = mysqli_real_escape_string($conn, ($_POST["password"]));
        $cpassword = mysqli_real_escape_string($conn, ($_POST["cpassword"]));
    
        if ($password === $cpassword) {
                $sql = "UPDATE users SET usersUid='$username', usersEmail='$email', usersAddress='$address' WHERE usersId='{$_SESSION["userid"]}'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Profile Updated successfully.');</script>";
                    header("location:Profile.php");
                    exit();
                    

                } else {
                    echo "<script>alert('Profile can not Updated.');</script>";
                    echo  $conn->error;
                }
        } else {
            echo "<script>alert('Password not matched. Please try again.');</script>";
        }
    }
    

?>
<style>
    body {
      overflow: hidden; /* Hide scrollbars */
    }
</style>
<body>
<img id="bgbg" src="resources/forest.gif" alt="" />
    <div class="info">
        <div class="register-form">
            <h2>Profile</h2>
            <form  action=""  method="post" enctype="multipart/form-data">
                <?php 
            
                $sql = "SELECT * FROM users WHERE usersId='{$_SESSION["userid"]}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="register-element">
                <input type="text" id="username" name="username" placeholder="Username" value="" required>
                </div>
                <br>
             <div class="register-element">
                <input type="email" id="email" name="email" placeholder="Email" value=""required>
                </div>
                <br>
                <div class="register-element">
                <input type="text" id="address" name="address" placeholder="Address" value="" required>
                </div>
                <br>
                <div class="register-element">
                    <input type="password" id="password" name="password" placeholder="Password" value="" required>
                </div>
                <br>
                <div class="register-element">
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" value="" required>
                </div>
                <br>
                <?php
                 }
             }

                ?>
                <div>
                    <button onclick="location.href='Profile.php'"  class="button2">Go Back</button>
                    
                </div>
                <br>
                <div>
                    <button name="submit" class="button2">Update Profile</button>
                </div>
        </form>
    </div>

    </div>
</body