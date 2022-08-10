<?php
    include 'Header.php';
?>


  <body class="logregbody">

    <?php
        include 'Navbar.php';
    ?>

   <!-- START OF LOGIN -->
   <div class="mainlogin">
    <img id="bgbg" src="resources/forest.gif" alt="" />
    <div id="login" class="info">
      <form
        class="login-form animate"
        action="includes/login.inc.php"
        method="post"
      >
        <div class="image">
          <img src="./resources/login icon.png" alt="Img" class="Image" />
        </div>

        <div class="login-element">
          <label for="username"><b>Email/Username</b></label>
          <input
            type="text"
            placeholder="abc@abc.com/abc..."
            name="uid"
          />

          <label for="pass"><b>Password</b></label>
          <input
            type="password"
            placeholder="Enter Password"
            name="pwd"
          />

          <button class="btn-logreg" type="submit" name="logsubmit">Login</button>
          
        </div>

        <div class="login-element">
          
        </div>
        <div class="login-element">
          <span onclick="document.getElementById('login').style.display='none'"><a href="#"class="show"onclick=document.getElementById('register').style.display='block'>Register</a></span>
        </div>
      </form>

      <?php
        if (isset($_GET["logerror"])) {
          if ($_GET["logerror"] == "emptyinput") {
            echo "<p style='font-size: 0.4em'>Fill in all fields!</p>";
          }
          else if ($_GET["logerror"] == "wronglogin") {
            echo "<p style='font-size: 0.4em'>Incorrect login information</p>";
          }
        }
      ?>

    </div>
  </div>

  <!-- End of Login -->
  
  <!-- START OF REGISTER -->
  <div class="mainregister">
    <div id="register" class="reginfo">
      <form
        class="register-form animate"
        action="includes/signup.inc.php"
        method="post"
      >
        <div class="image">
          <span onclick="document.getElementById('register').style.display='none'" class="close" title="Close Login" ><a onclick="document.getElementById('login').style.display='block'"">&times;</a></span>
          <img src="./resources/login icon.png" alt="Img"/>
        </div>

        <div class="register-element">
          
          <label for="mail"><b>Email</b></label>
          <input
            type="email"
            placeholder="Enter your Email"
            name="email"
          />

          <label for="username"><b>Username</b></label>
          <input
            type="text"
            placeholder="Enter your Username"
            name="uid"
          />

          <label for="address"><b>Address</b></label>
          <input
            type="text"
            placeholder="Enter your Address"
            name="address"
          />

          <label for="pass"><b>Password</b></label>
          <input
            type="password"
            placeholder="Enter your Password"
            name="pwd"
          />
          <label for="pass"><b>Confirm Password</b></label>
          <input
            type="password"
            placeholder="Confirm your Password"
            name="pwdrepeat"
          />

          <span><button class="btn-logreg" type="submit" name="regsubmit">Sign Up</button></span>

        </div>
      </form>

      <?php
        if (isset($_GET["regerror"])) {
          if ($_GET["regerror"] == "emptyinput") {
            echo "<p style='font-size: 0.4em'>Fill in all fields!</p>";
          }
          else if ($_GET["regerror"] == "invaliduid") {
            echo "<p style='font-size: 0.4em'>Choose a proper Username</p>";
          }
          else if ($_GET["regerror"] == "invalidemail") {
            echo "<p style='font-size: 0.4em'>Invalid email format!</p>";
          }
          else if ($_GET["regerror"] == "passwordsdontmatch") {
            echo "<p style='font-size: 0.4em'>Password does not match!</p>";
          }
          else if ($_GET["regerror"] == "usernametaken") {
            echo "<p style='font-size: 0.4em'>The username is already taken!</p>";
          }
          else if ($_GET["regerror"] == "none") {
            echo "<p style='font-size: 0.4em'>You have signed up!</p>";
          }
        }
      ?>

    </div>
  </div>
<!-- END OF REGISTER -->


  </body>
</html>
<!-- <div class="image">
  <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Login"></span>
  <img src="img_avatar2.png" alt="Img" class="Image">
</div> -->
