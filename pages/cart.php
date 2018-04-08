<?php
include 'inc/head.php';
include 'inc/nav.php';
// print_r($_SESSION['cart']);
?>

<div class="container cart">
  <div class="row">
    <div class="col-lg-9 your-cart-overview">
      <div class="row your-cart">
        <div class="col-sm-12">
          <h4>YOUR CART (<?php echo count($_SESSION['cart']); ?>)</h4>
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-12">
          <?php $i=0; foreach ($_SESSION['cart'] as $cartitems) { ?>
          <div class="row productRow">
            <div class="col-md-3 productImage">
              <img class="img-fluid " src="<?php echo $cartitems['image']; ?>" alt="prewiew">
            </div>
            <div class="col-md-6 prodcutDetails">
              <a href="<?php echo $cartitems['slug']; ?>">
                <p class="product-name"><?php echo $cartitems['name']; ?></p>
              </a>
              <p>
                <span class="cartItemOption">Prodcut #:
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
          <?php $i++;} ?>
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
              $summary_subtotal += $cartitems['price'];
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
            <h5 class="tax-total">$<?php $tax = $subtotal * 0.06;
            echo number_format((float)$tax, 2, '.', ''); ?></h5>
          </div>
          <div class="summaryRow total">
            <h5>Total</h5>
            <h5 class="total-total">$<?php $total = $summary_subtotal + $shipping + $tax;
            echo number_format((float)$total, 2, '.', ''); ?></h5>
          </div>
          <div class="summaryRowEnd checkout">
            <button type="button" name="button">CHECKOUT</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- <table>
  <tbody>
    <tr>
      <th>Prodcut Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Description</th>
    </tr>
    <?php

      echo "<tr><td>$cartitems[name]</td>";
      echo "<td>$cartitems[price]</td>";
      echo "<td>$cartitems[qty]</td>";
      echo "<td>$cartitems[desc]</td></tr>";

    ?>
  </tbody>
</table> -->


<?php include 'inc/footer.php';?>
