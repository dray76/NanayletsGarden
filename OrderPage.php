<?php
    include 'Header.php';
?>
  
  <body>
    <div class="parent">
      <div class="container">
          
        <?php
            include 'Carousel.php';
        ?>

        <div class="inner-container">
        <!-- ============START OF NAVABR ============ -->

          <?php
            include 'Navbar.php';
          ?>

          <?php
            if (isset($_SESSION["useruid"])) {
              if ($_SESSION["useruid"] == "Admin") {
                echo '<button class="btn btn-primary btn-addItem" type="button">ADD ITEM</button>';
              }
            }
          ?>
          <div class="modal-bg">
            <div class="modal">
              <h2>this is a modal</h2>
              <p>Some text in the Modal..</p>
            </div> 
          </div>
          
         <!-- !!!!!change role to type -->
          <!-- ===========START OF ITEMS=============-->
            <section class="content-section ItemContainer">
              <h2 class="section-header">ITEMS</h2>
              <div class="shop-items">
                <div class="shop-item">
                  <span class="shop-item-title">Gardening Pot</span>
                  <img class="shop-item-image" src="resources/pot.png" alt="">
                  <div class="shop-item-details">
                    <span class="shop-item-price">₱200</span>
                    <?php
                      if (isset($_SESSION["useruid"])) {
                        if ($_SESSION["useruid"] !== "Admin") {
                          echo '<button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>';
                        }
                        else {
                          echo '<button class="btn btn-primary" type="button">REMOVE ITEM</button>';
                        }
                      }
                      else {
                        echo "<button class='btn btn-primary' type='button' onclick='sendTologreg()'>ADD TO CART</button>";
                      }
                    ?>
                  </div>
                </div>

                <div class="shop-item">
                  <span class="shop-item-title">Gardening Shovel</span>
                  <img class="shop-item-image" src="resources/gardeningshovel.png" alt="">
                  <div class="shop-item-details">
                    <span class="shop-item-price">₱220</span>
                    <?php
                      if (isset($_SESSION["useruid"])) {
                        if ($_SESSION["useruid"] !== "Admin") {
                          echo '<button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>';
                        }
                        else {
                          echo '<button class="btn btn-primary" type="button">REMOVE ITEM</button>';
                        }
                      }
                      else {
                        echo "<button class='btn btn-primary' type='button' onclick='sendTologreg()'>ADD TO CART</button>";
                      }
                    ?>
                  </div>
                </div>

                <div class="shop-item">
                  <span class="shop-item-title">Green Snake Plant</span>
                  <img class="shop-item-image" src="resources/greensnakeplant.jpg" alt="">
                  <div class="shop-item-details">
                    <span class="shop-item-price">₱2300</span>
                    <?php
                      if (isset($_SESSION["useruid"])) {
                        if ($_SESSION["useruid"] !== "Admin") {
                          echo '<button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>';
                        }
                        else {
                          echo '<button class="btn btn-primary" type="button">REMOVE ITEM</button>';
                        }
                      }
                      else {
                        echo "<button class='btn btn-primary' type='button' onclick='sendTologreg()'>ADD TO CART</button>";
                      }
                    ?>
                  </div>
                </div>

                <!-- <div class="shop-item">
                  <span class="shop-item-title">Dendrobium Thongchai <br> Gold</span>
                  <img class="shop-item-image" src="resources/dendrobium thongchai gold.png" alt="">
                  <div class="shop-item-details">
                    <span class="shop-item-price">₱755</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                  </div>
                </div> -->

                <div class="shop-item">
                  <span class="shop-item-title">Monstera deliciosa</span>
                  <img class="shop-item-image" src="resources/Monstera deliciosa L.jpg" alt="">
                  <div class="shop-item-details">
                    <span class="shop-item-price">₱4200</span>
                    <?php
                      if (isset($_SESSION["useruid"])) {
                        if ($_SESSION["useruid"] !== "Admin") {
                          echo '<button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>';
                        }
                        else {
                          echo '<button class="btn btn-primary" type="button">REMOVE ITEM</button>';
                        }
                      }
                      else {
                        echo "<button class='btn btn-primary' type='button' onclick='sendTologreg()'>ADD TO CART</button>";
                      }
                    ?>
                  </div>
                </div>

                <div class="shop-item">
                  <span class="shop-item-title">Ficus Audrey</span>
                  <img class="shop-item-image" src="resources/ficus audrey.jpg" alt="">
                  <div class="shop-item-details">
                    <span class="shop-item-price">₱5900</span>
                    <?php
                      if (isset($_SESSION["useruid"])) {
                        if ($_SESSION["useruid"] !== "Admin") {
                          echo '<button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>';
                        }
                        else {
                          echo '<button class="btn btn-primary" type="button">REMOVE ITEM</button>';
                        }
                      }
                      else {
                        echo "<button class='btn btn-primary' type='button' onclick='sendTologreg()'>ADD TO CART</button>";
                      }
                    ?>
                  </div>
                </div>

                <div class="shop-item">
                  <span class="shop-item-title">Rhaphidophora<br>tetrasperma</span>
                  <img class="shop-item-image" src="resources/Rhaphidophora tetrasperma.jpg" alt="">
                  <div class="shop-item-details">
                    <span class="shop-item-price">₱1300</span>
                    <?php
                      if (isset($_SESSION["useruid"])) {
                        if ($_SESSION["useruid"] !== "Admin") {
                          echo '<button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>';
                        }
                        else {
                          echo '<button class="btn btn-primary" type="button">REMOVE ITEM</button>';
                        }
                      }
                      else {
                        echo "<button class='btn btn-primary' type='button' onclick='sendTologreg()'>ADD TO CART</button>";
                      }
                    ?>
                  </div>
                </div>

              </div>
            </section>
    <!-- cart -->
           <?php
            
            if (isset($_SESSION["useruid"])) {
              if ($_SESSION["useruid"] !== "Admin") {
                include 'Cart.php';
              }
            }
           ?>
        </div>
        <!-- ===========END OF ITEMS=========== -->

        <?php
          include 'footer.php';
        ?>

      </div>
    </div>
  </body>
  
</html>
