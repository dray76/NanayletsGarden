<section class="ItemContainer content-section">
              <h2 class="section-header">CART</h2>
              <div class="cart-row">
                <span class="cart-header cart-column cart-item">ITEM</span>
                <span class="cart-header cart-column cart-price">PRICE</span>
                <span class="cart-header cart-column cart-quantity">QUANTITY</span>
              </div>

              <form action="includes/order.inc.php" method="GET">
                <div class="cart-items">
                
                </div>
              
              
                <div class="cart-total">
                  <strong class="cart-total-title">Total</strong>
                  ₱<input class="cart-total-price" name="ordtotal" value="0" readonly/>
                </div>

                      
                <?php
                      if (isset($_SESSION["useruid"])) {
                        echo '<button class="btn btn-primary btn-purchase" type="submit" name="ordersubmit">PURCHASE</button>';
                      }
                      else {
                        echo '<button class="btn btn-primary btn-notpurch" role="button" onclick="sendTologreg()">PURCHASE</button>';
                      }

                      if (isset($_GET["ordererror"])) {
                        if ($_GET["ordererror"] == "emptycart") {
                          echo "<p style='font-size: 0.8em; color: red;'>You don't have anything in your cart!</p>";
                        }
                        else if ($_GET["ordererror"] == "invaliduid") {
                          echo "<p style='font-size: 0.8em'>Choose a proper Username</p>";
                        }
                      }
                      
                ?>
              </form>
            </section>