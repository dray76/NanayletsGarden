<?php
include 'Header.php';
include 'includes/dbh.inc.php';
include 'Carousel.php';
include 'Navbar.php'

?>
<body>
    <div class="wrapp">
        <?php
        // SQL query
        $strSQL = "SELECT usersUid, usersEmail, usersAddress, usersPwd FROM users WHERE usersId = '".$_SESSION['userid']."'";

        // Execute the query (the recordset $rs contains the result)
        $rs = mysqli_query($conn, $strSQL);
        ?>
        <?php
            while($row = mysqli_fetch_array($rs)){           
        ?>
            <div class="lef">
            <h4><?php echo $row['usersUid'];?></h4>
             
             <br>
             <br>
             <br>
             <br>
             <button onclick="location.href='ProfileUpdate.php'"class="button">Update Your Profile </button>
             <br>
             <br>
        </div>         
        <div class="righ">
            <div class="infoprof">
                <h3>Information</h3>
                <div class="info_dataprof">
                     <div class="dataprof">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="<?php echo $row['usersEmail'];?>" readonly><br><br>
                        <!-- <h4>Email</h4>
                        <p>User@email</p> -->
                     </div>
                </div>
                <div class="info_dataprof">
                    <div class="dataprof">
                        <label for="uname">Display Name</label>
                        <input type="text" id="uname" name="uname" placeholder="<?php echo $row['usersUid'];?>" readonly><br><br>
                        <!-- <h4>Full Name</h4>
                        <p>UserFullname</p> -->
                     </div>
                </div>
                <div class="info_dataprof">
                    <div class="dataprof">
                        <label for="adr">Address</label>
                        <input type="text" id="adr" name="adr" placeholder="<?php echo $row['usersAddress'];?>" readonly><br><br>
                        <!-- <h4>Full Name</h4>
                        <p>UserFullname</p> -->
                    </div>
                </div>
                <div class="info_dataprof">
                    <div class="dataprof">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" name="pass" placeholder="<?php echo $row['usersPwd'];?>" readonly><br><br>
                       <!-- <h4>Phone</h4>
                       <p>0001-213-998761</p> -->
                    </div>
               </div>
               <div>
               </div>

            </div>
        </div>
        <?php
            } //bat andito to ? HAHAHHAHAHAHAHHAH
        ?>         
        <?php
            mysqli_close($conn);
        ?>
    </div>
</html>