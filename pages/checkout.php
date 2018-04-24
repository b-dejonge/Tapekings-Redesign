<?php include 'inc/head.php'; ?>
<?php if (!isset($_SESSION['cart']) || $_SESSION['cart'] == "") {
  header("Location: ./cart");exit(); }
  require_once 'app/database.php'; ?>

<body>
  <?php include 'inc/nav.php'; ?>
  <div class="container checkoutCointainer">
    <form class="needs-validation" method="POST" action="inc/checkout.php" novalidate>
    <div class="row">
        <!-- <div class="col-md-4 order-md-2 mb-4"> -->
          <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form> -->

          <div class="col-md-3 order-md-2 mb-4 summary">
            <div class="row">
              <div class="col-sm-12 summaryColumn">
                <div class="summaryRowBegin title">
                  <h4>Summary</h4>
                </div>
                  <?php foreach ($_SESSION['cart'] as $cartitems) { ?>
                    <?php if(!isset($cartitems['id'])){ ?>
                      <div class="summaryRow">
                        <h6 class="product-name my-0"><?php echo $cartitems['name']; ?></h6>
                        <h6 class="product-total">$<?php $subtotal = $cartitems['price'] * $cartitems['qty'];
                        echo number_format((float)$subtotal, 2, '.', ''); ?></h5>
                        <br>
                        <small class='text-muted checkoutItemOption'><?php echo $cartitems['grip-type'] ?> Grip</small>
                        <small class="text-muted checkoutItemOption"><?php echo $cartitems['design-type']; ?></small>
                        <small class="text-muted checkoutItemOption"><?php echo $cartitems['color1'] . ", " . $cartitems['color2'] . ", " . $cartitems['color3']; ?></small>
                        <input type="hidden" name="grip-type" value="<?php echo $cartitems['grip-type'] ?>">
                        <input type="hidden" name="design-type" value="<?php echo $cartitems['design-type'] ?>">
                        <input type="hidden" name="color1" value="<?php echo $cartitems['color1'] ?>">
                        <input type="hidden" name="color2" value="<?php echo $cartitems['color2'] ?>">
                        <input type="hidden" name="color3" value="<?php echo $cartitems['color3'] ?>">
                      </div>
                    <?php } else{ ?>
                      <div class="summaryRow checkoutRow">
                        <h6 class="product-name my-0"><?php echo $cartitems['name']; if($cartitems['qty']>1){?><small><?php echo " x ".$cartitems['qty'];} ?></small></h6>
                        <h6 class="product-total">$<?php $subtotal = $cartitems['price'] * $cartitems['qty'];
                        echo number_format((float)$subtotal, 2, '.', ''); ?></h5>
                        <input type="hidden" name="id" value="<?php echo $cartitems['id'] ?>">
                        <input type="hidden" name="qty" value="<?php echo $cartitems['qty'] ?>">
                      </div>
                  <?php }} ?>
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
                  <h5 class="shipping-total">$<?php if (isset($cartitems['grip-type'])){
                    if($cartitems['grip-type'] == "Hydro" || $cartitems['grip-type'] == "Custom"){
                    $shipping = 0;
                  } else {
                    $shipping = 5;
                  }} else{
                    $shipping = 5;
                  }
                  echo number_format((float)$shipping, 2, '.', ''); ?></h5>
                  <input type="hidden" name="shipping" value="<?php echo $shipping; ?>">
                </div>
                <div class="summaryRow taxes">
                  <h5>Tax</h5>
                  <h5 class="tax-total">$<?php $tax = $summary_subtotal * 0.07;
                  echo number_format((float)$tax, 2, '.', ''); ?></h5>
                  <input type="hidden" name="tax" value="<?php echo $tax; ?>">
                </div>
                <div class="summaryRowEnd total">
                  <h5>Total</h5>
                  <h5 class="total-total">$<?php $total = $summary_subtotal + $shipping + $tax;
                  echo number_format((float)$total, 2, '.', ''); ?></h5>
                  <input type="hidden" name="total" value="<?php echo $total; ?>">
                </div>
                <!-- <div class="summaryRowEnd">
                  <button type="submit" name="button">PLACE ORDER</button>
                </div> -->
              </div>
            </div>
          </div>
        <!-- </div> -->
        <div class="col-md-9 order-md-1">
          <h4 class="mb-3">Billing address</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="billingFirstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="billingLastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Username)</span></label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="billingAddress" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your billing address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="billingAddress2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" name="billingCity" placeholder="" required>
                <div class="invalid-feedback">
                  Please select a valid city.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" name="billingState" required>
                  <option value="">Choose...</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" name="billingZip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="same-address" id="same-address" onchange="checkChecked()" checked>
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <hr class="mb-4">

            <div id="shippingAddress">
              <h4 class="mb-3">Shipping address</h4>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">First name</label>
                  <input type="text" class="form-control" name="shippingFirstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input type="text" class="form-control" name="shippingLastName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="shippingAddress" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="mb-3">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" name="shippingAddress2" placeholder="Apartment or suite">
              </div>

              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="city">City</label>
                  <input type="text" class="form-control" name="shippingCity" placeholder="" required>
                  <div class="invalid-feedback">
                    Please select a valid city.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="state">State</label>
                  <select class="custom-select d-block w-100" name="shippingState" required>
                    <option value="">Choose...</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="zip">Zip</label>
                  <input type="text" class="form-control" name="shippingZip" placeholder="" required>
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
              </div>
              <hr class="mb-4">
            </div>

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <!-- <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div> -->
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" max="16" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" max="5" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" max="3" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn" name="checkout-submit" type="submit">PLACE ORDER</button>
          </form>
        </div>
      </div>
    </div>
    <!-- <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
            'use strict';

            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');

              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();


        </script> -->
    <?php include 'inc/footer.php'; ?>
    <script>
    function checkChecked(){
      var same_address = $("#same-address").is(":checked");
      if (same_address == false) {
        $("#shippingAddress").css("display","block");
      } else {
        $("#shippingAddress").css("display","none");
      }
    }
    checkChecked();
    </script>
