<?php
    include 'Header.php';
?>

  <body>
    <div id="parent">
      <div id="container">

        <?php
            include 'Carousel.php';
        ?>



        <div class="inner-container" >

          <!-- navigation bar -->
          <?php
            include 'Navbar.php';
          ?>
          <!-- navigation bar end -->

<!-- =========START OF WELCOME HABADU============ -->
          <!-- Contents -->
          <div class="content">
            <div class="welcome">

              <div class="welcome-header">
                <h1>Nanay Let's Garden</h1>
              </div>

              <div class="welcome-subtext">
                <h2>Make a garden in the palm of your hands. Let it all be green & beautiful.</h2>
              </div>

              <div class="welcome-container">
               
                <div class="welcome-plant">
                  <img id="siomai" src="resources/smallplantSky.jpg" alt="picture of a plant on a clear sunny day">
                </div>

              </div>
                <!-- ==========END OF WELCOME HABADU========== -->
              
            </div>

            <div class="suggested">
              <div class="suggested-header">
                <h1 >Suggested Items</h1>
              </div> 
  
              <br>
              
              <div class="suggested-container">
                
                <div class="suggested-item">
                  <div class="suggested-item-content">
                    
                    <img src="resources/pot.png" alt="A picture of a gardening pot">
                    <br> Garden Pot
                  </div>
                </div>
  
                <div class="suggested-item">
                  <div class="suggested-item-content">
                    
                   <img src="resources/gardeningshovel.png" alt="A picture of a gardening shovel">
                   <br> Gardening Shovel
                  </div>
                </div>
  
                <div class="suggested-item">
                  <div class="suggested-item-content">
                    
                    <img src="resources/ficus audrey.jpg" alt="">
                    <br> Ficus Audrey  
                  </div>
                </div>
              </div>
  
              <br>
              
              <div class="order-now">
                <a href="OrderPage.php">Order Now</a>
              </div>
            </div>
            
          </div>
        </div>

  <!-- ==========END OF WELCOME HABADU========== -->
      </div>
    </div>

    <br>

    <?php
        include 'footer.php';
    ?>
  </body>
</html>
