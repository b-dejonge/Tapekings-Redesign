<?php
require_once '../app/database.php';
session_start();



// if(isset($_POST['id'])){

  if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
  } else {
    $userID = NULL;
  }
  // Billing
  $billingFirstName = $_POST['billingFirstName'];
  $billingLastName = $_POST['billingLastName'];
  $email = $_POST['email'];
  $billingAddress = $_POST['billingAddress'];
  $billingAddress2 = $_POST['billingAddress2'];
  $billingCity = $_POST['billingCity'];
  $billingState = $_POST['billingState'];
  $billingZip = $_POST['billingZip'];

  $same_address = $_POST['same-address'];
  // Shipping
  if ($same_address == "on") {
    $shippingFirstName = $billingFirstName;
    $shippingLastName = $billingLastName;
    $shippingAddress = $billingAddress;
    $shippingAddress2 = $billingAddress2;
    $shippingCity = $billingCity;
    $shippingState = $billingState;
    $shippingZip = $billingZip;
  } else {
    $shippingFirstName = $_POST['shippingFirstName'];
    $shippingLastName = $_POST['shippingLastName'];
    $shippingAddress = $_POST['shippingAddress'];
    $shippingAddress2 = $_POST['shippingAddress2'];
    $shippingCity = $_POST['shippingCity'];
    $shippingState = $_POST['shippingState'];
    $shippingZip = $_POST['shippingZip'];
  }

  $total = $_POST['total'];
  $total = number_format((float)$total, 2, '.', '');
  $shipping = $_POST['shipping'];
  $tax = $_POST['tax'];
  $tax = number_format((float)$tax, 2, '.', '');

  $sql = "INSERT INTO orders (userID, orderDate, total, shipping, tax, billingFirstName, billingLastName, email, billingAddress, billingAddress2, billingCity, billingState, billingZip, shippingFirstName, shippingLastName, shippingAddress, shippingAddress2, shippingCity, shippingState, shippingZip) VALUES ('$userID', NOW(), '$total', '$shipping', '$tax', '$billingFirstName', '$billingLastName', '$email', '$billingAddress', '$billingAddress2', '$billingCity', '$billingState', '$billingZip', '$billingFirstName', '$shippingLastName', '$shippingAddress', '$shippingAddress2', '$shippingCity', '$shippingState', '$shippingZip');";
  echo $sql;
  mysqli_query($conn, $sql);
  $orderID = mysqli_insert_id($conn);

  foreach ($_SESSION['cart'] as $cartitems) {
    if (isset($cartitems['grip-type'])) {
      $grip_type = $cartitems['grip-type'];
      if ($grip_type=="Basic") {
        $price=10;
        $product_id=101;
      } else if ($grip_type=="Standard") {
        $price=20;
        $product_id=102;
      } else if ($grip_type=="Hydro") {
        $price=30;
        $product_id=103;
      } else if ($grip_type=="Custom") {
        $price=40;
        $product_id=104;
      }
      $design_type = $cartitems['design-type'];
      $color1 = $cartitems['color1'];
      $color2 = $cartitems['color2'];
      $color3 = $cartitems['color3'];
      $qty=1;
      $name = "Send Us Your Bat";
      $sql = "INSERT INTO orderproducts (orderID, productID, title, qty, price, grip_type, design_type, color1, color2, color3) VALUES ('$orderID', '$product_id', '$name', '$qty', '$price', '$grip_type', '$design_type', '$color1', '$color2', '$color3');";
      // mysqli_query($conn, $sql);
    } else {
      // $product_id = $_POST['id'];
      // $qty = $_POST['qty'];
      // $sql = "SELECT title, price FROM products WHERE $product_id = id";
      // $result = mysqli_query($conn, $sql);
      $sql = "INSERT INTO orderproducts (orderID, productID, title, qty, price) VALUES ('$orderID', '$cartitems[id]', '$cartitems[name]', '$cartitems[qty]', '$cartitems[price]');";
    }
    mysqli_query($conn, $sql);

    echo $sql."<br>";

  }
  echo $orderID;









// } else if (isset($_POST['grip-type'])) {
//   $grip_type = $_POST['grip-type'];
//   if ($grip_type=="basic") {
//     $price=10;
//     $product_id=101;
//   } else if ($grip_type=="standard") {
//     $price=20;
//     $product_id=102;
//   } else if ($grip_type=="hydro") {
//     $price=30;
//     $product_id=103;
//   } else if ($grip_type=="custom") {
//     $price=40;
//     $product_id=104;
//   }
//   $design_type = $_POST['design-type'];
//   $color1 = $_POST['color1'];
//   $color2 = $_POST['color2'];
//   $color3 = $_POST['color3'];
//   $image = "css/img/products/designs/".$design_type.".jpg";
//   $qty=1;
//   $name = "Send Us Your Bat";
//
//   $sql = "INSERT INTO orders (userID, orderDate) VALUES
//           ('$userID', NOW());";
//   mysqli_query($conn, $sql);
//   $orderID = mysqli_insert_id($conn);
//
//   $sql = "INSERT INTO orderproducts (orderID, prodcutID, qty, price, grip-type, design-type, color1, color2, color3) VALUES
//           ('$orderID', '$product_id', '$qty', '$price', '$grip_type', '$design_type', '$color1', '$color2', '$color3');";
//   mysqli_query($conn, $sql);
// }

?>
