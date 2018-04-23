<?php
include 'inc/head.php';
// print_r($_SESSION['cart']);
include 'inc/nav.php';
// echo "<br>" . $_SESSION['itemExists'];
?>

<div class="container cart">
  <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){ ?>
  <div class="row">
    <div class="col-lg-9 your-cart-overview">
      <div class="row your-cart">
        <div class="col-sm-12">
          <h4>YOUR CART (<?php $total_qty=0; foreach ($_SESSION['cart'] as $cartitems) {$total_qty += $cartitems['qty']; } echo $total_qty; ?>)</h4>
          <!-- <?php print_r($_SESSION['cart']); ?> -->
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-12">
          <?php $i=0; foreach ($_SESSION['cart'] as $cartitems) { if (isset($cartitems['id'])) { ?>
          <div class="row productRow">
            <div class="col-md-3 productImage">
              <img class="img-fluid" src="<?php echo $cartitems['image']; ?>" alt="preview">
            </div>
            <div class="col-md-6 productDetails">
              <a href="<?php if (strpos($cartitems['slug'], 'tape')) {
                echo "store/tape/";} echo $cartitems['slug']; ?>">
                <p class="product-name"><?php echo $cartitems['name']; ?></p>
              </a>
              <p>
                <span class="cartItemOption">Product #:
                  <span class="text-muted"><?php echo $cartitems['id']; ?></span>
                </span>
                <span class="cartItemOption">Qty:
                  <span class="text-muted"><?php echo $cartitems['qty'] . " @ $" . $cartitems['price']; ?>
                </span>
              </p>
              <button type="button" name="button" class="btn btn-cart" onclick="cart.remove(<?php echo $i; ?>)">REMOVE</button> <button type="button" name="button" class="btn btn-cart">EDIT</button>
            </div>
            <div class="col-md-3 productTotal">
              <span class="product-total">$<?php $subtotal = $cartitems['price'] * $cartitems['qty'];
              echo number_format((float)$subtotal, 2, '.', '');
?></span>
            </div>
          </div>
          <?php } else { ?>
            <div class="row productRow">
              <div class="col-md-3 productImage">
                <img class="img-fluid design" src="<?php echo $cartitems['image']; ?>" alt="preview">
              </div>
              <div class="col-md-6 productDetails">
                <a href="<?php echo "store/send-us-your-bat/".$cartitems['grip-type']; ?>">
                  <p class="product-name">Send Us Your Bat</p>
                </a>
                <p>
                  <span class="cartItemOption">Grip Type:
                    <span class="text-muted"><?php echo $cartitems['grip-type']; ?></span>
                  </span>
                  <span class="cartItemOption">Design:
                    <span class="text-muted"><?php echo $cartitems['design-type']; ?></span>
                  </span>
                  <span class="cartItemOption">Color 1:
                    <span class="text-muted"><?php echo $cartitems['color1']; ?></span>
                  </span>
                  <span class="cartItemOption">Color 2:
                    <span class="text-muted"><?php echo $cartitems['color2']; ?></span>
                  </span>
                  <span class="cartItemOption">Color 3:
                    <span class="text-muted"><?php echo $cartitems['color3']; ?></span>
                  </span>
                  <span class="cartItemOption">Qty:
                    <span class="text-muted"><?php echo $cartitems['qty'] . " @ $" . $cartitems['price']; ?>
                  </span>
                </p>
                <button type="button" name="button" class="btn btn-cart" onclick="cart.remove(<?php echo $i; ?>)">REMOVE</button> <button type="button" name="button" class="btn btn-cart">EDIT</button>
              </div>
              <div class="col-md-3 productTotal">
                <span class="product-total">$<?php $subtotal = $cartitems['price'] * $cartitems['qty'];
                echo number_format((float)$subtotal, 2, '.', '');
  ?></span>
              </div>
            </div>
          <?php }$i++;} ?>
        </div>
      </div>
    </div>
    <div class="col-lg-3 summary">
      <div class="row ">
        <div class="col-sm-12 summaryColumn">
          <div class="summaryRowBegin title">
            <h4>Summary</h4>
          </div>
          <div class="summaryRow promo">
            <h5>Promo Code</h5>
            <input type="text" name="" value=""><button type="button" name="button">APPLY</button>
          </div>
          <div class="summaryRow subtotal">
            <h5>Subtotal</h5>
            <h5 class="summary-subtotal">$<?php
            $summary_subtotal = 0;
            foreach ($_SESSION['cart'] as $cartitems) {
              $summary_subtotal += $cartitems['price']*$cartitems['qty'];
            }
            echo number_format((float)$summary_subtotal, 2, '.', ''); ?></h5>
          </div>
          <div class="summaryRow shipping">
            <h5>Shipping</h5>
            <h5 class="shipping-total">$<?php $shipping = 8;
            echo number_format((float)$shipping, 2, '.', ''); ?></h5>
          </div>
          <div class="summaryRow taxes">
            <h5>Tax</h5>
            <h5 class="tax-total">$<?php $tax = $summary_subtotal * 0.07;
            echo number_format((float)$tax, 2, '.', ''); ?></h5>
          </div>
          <div class="summaryRow total">
            <h5>Total</h5>
            <h5 class="total-total">$<?php $total = $summary_subtotal + $shipping + $tax;
            echo number_format((float)$total, 2, '.', ''); ?></h5>
          </div>
          <div class="summaryRowEnd checkout">
            <a href="checkout"><button type="button" name="button">CHECKOUT</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }else{ ?>
    <div class="row">
      <div class="col-sm-12">
        <h4>Your cart is empty</h4>
        <a href="store"><-Continue Shopping</a>
        <br><br><br><br><br>
      </div>
    </div>
  <?php } ?>
</div>


<?php include 'inc/footer.php';?>
