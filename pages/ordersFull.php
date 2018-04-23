<!DOCTYPE html>
<html>
  <head>
    <base href="http://localhost/tapekings-redesign/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TapeKings | <?php echo $_SESSION['title']; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="../tapekings-redesign/favicon.ico">
    <link rel="stylesheet" href="lib/normalize/normalize.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
    <!-- <link rel="stylesheet" href="css/bootstrap/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500,900|Cabin:400,500,600" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


  </head>
  <?php include 'app/database.php' ?>

<body class="dashboard">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">TapeKings</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="account">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="orders">
                  <span data-feather="file"></span>
                  Orders <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="customers">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <?php
          $sql = "SELECT * FROM orders, orderproducts WHERE orders.orderID = orderproducts.orderID && orders.orderID = $_SESSION[orderID];";
          $result = mysqli_query ($conn, $sql);

          while($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $date = date_create($row['orderDate']);
            $date = date_format($date, "m/d/y");
            // $paymentMethod = $row['paymentMethod'];
            $billingFirstName = $row['billingFirstName'];
            $billingLastName = $row['billingLastName'];
            $billingAddress = $row['billingAddress'];
            $billingAddress2 = $row['billingAddress2'];
            $billingCity = $row['billingCity'];
            $billingState = $row['billingState'];
            $billingZip = $row['billingZip'];
            $shippingFirstName = $row['shippingFirstName'];
            $shippingLastName = $row['shippingLastName'];
            $shippingAddress = $row['shippingAddress'];
            $shippingAddress2 = $row['shippingAddress2'];
            $shippingCity = $row['shippingCity'];
            $shippingState = $row['shippingState'];
            $shippingZip = $row['shippingZip'];

            $sql = "SELECT * FROM orderproducts WHERE $_SESSION[orderID] = orderID;";
            $result = mysqli_query ($conn, $sql);
            while($row = $result->fetch_assoc()) {
              $product_id = $row['productID'];
              $qty = $row['qty'];
              $price = $row['price'];
              $name = $row['title'];
            }
          } ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <h2>Orders</h2>
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <h4 class="card-header">Order Details</h4>
                  <table>
                    <tbody>
                      <tr><td><?php echo $date; ?></td></tr>
                      <tr><td><?php //echo $paymentMethod ?>Credit Card</td></tr>
                      <tr><td>USPS</td></tr>
                    </tbody>
                  </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <h4 class="card-header">Order Customer Details</h4>
                  <table>
                    <tbody>
                      <tr><td><?php echo $billingFirstName . " " . $billingLastName; ?></td></tr>
                      <tr><td><?php echo $email ?></td></tr>
                      <tr><td>(542)484-2824</td></tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
          <div class="row orderInfo">
            <div class="col-md-12">
              <div class="card">
                <h5>Order (#<?php echo $_SESSION['orderID']; ?>)</h5>
                <table class="table table-bordered">
                  <thead>
                    <th>Billing Address</th>
                    <th>Shipping Address</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <?php echo $billingFirstName . " " . $billingLastName; ?><br>
                        <?php echo $billingAddress; ?><br>
                        <?php if($billingAddress2!== ""){echo $billingAddress2."<br>";} ?>
                        <?php echo $billingCity . " " . $billingState . " " . $billingZip; ?>
                      </td>
                      <td>
                        <?php echo $shippingFirstName . " " . $shippingLastName; ?><br>
                        <?php echo $shippingAddress; ?><br>
                        <?php if($shippingAddress2!== ""){echo $shippingAddress2."<br>";} ?>
                        <?php echo $shippingCity . " " . $shippingState . " " . $shippingZip; ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table>
                  <thead>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <?php echo $name;
                        if ($name == "Send Us Your Bat"){?>
                          <small><?php echo $grip_type; ?></small>
                          <small><?php echo $design_type; ?></small>
                          <small><?php echo $color1; ?></small>
                          <small><?php echo $color2; ?></small>
                          <small><?php echo $color3; ?></small>
                        <?php } ?>
                      </td>
                      <td><?php echo $qty; ?></td>
                      <td><?php echo $price; ?></td>
                      <td><?php $subtotal = $price * $qty;
                      echo number_format((float)$subtotal, 2, '.', '') ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>




  <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="lib/jquery/jquery-2.1.3.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    // Add slideDown animation to Bootstrap dropdown when expanding.
    $('.dropdown').on('show.bs.dropdown', function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.bs.dropdown', function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
    </script>
    <script src="js/common.js"></script>
  </body>
  </html>
