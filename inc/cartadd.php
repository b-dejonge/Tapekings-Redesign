<?php

// if (isset($_POST['add-to-cart'])){
require_once '../app/database.php';
session_start();
// unset($_SESSION['cart']);
if (!isset($_SESSION['cart']) || $_SESSION['cart'] == "") {
  $_SESSION['cart'] = array();
}

if (isset($_POST['send-us-your-bat-submit'])) {
  $grip_type = $_POST['grip-type'];
  $design_type = $_POST['design-type'];
  $color1 = $_POST['color1'];
  $color2 = $_POST['color2'];
  $color3 = $_POST['color3'];
  $image = "css/img/products/designs/".$design_type.".jpg";
  $qty=1;
  $name = "Send Us Your Bat";

  if ($grip_type=="basic") {
    $price=10;
  } else if ($grip_type=="standard") {
    $price=20;
  } else if ($grip_type=="hydro") {
    $price=30;
  } else if ($grip_type=="custom") {
    $price=40;
  }

  $grip_type = ucwords ($grip_type);
  $design_type = preg_replace("/-+/", " ", $design_type);
  $design_type = ucwords ($design_type);
  $color1 = preg_replace("/-+/", " ", $color1);
  $color1 = ucwords ($color1);
  $color2 = preg_replace("/-+/", " ", $color2);
  $color2 = ucwords ($color2);
  $color3 = preg_replace("/-+/", " ", $color3);
  $color3 = ucwords ($color3);

  $item = array(
    "image" => $image,
    "name" => $name,
    "grip-type" => $grip_type,
    "design-type" => $design_type,
    "color1" => $color1,
    "color2" => $color2,
    "color3" => $color3,
    "price" => $price,
    "qty" => $qty
  );

  $_SESSION['cart'][] = $item;

  header("Location: ../cart");
  exit();
}


// $addItem = $_POST['id'];
$product_id = $_POST['id'];
$qty = $_POST['qty'];

// $price = $_POST['price'];
// array_push($_SESSION['cart'],$item,$price);
// $_SESSION['cart'] = array();

$sql = "SELECT * FROM products WHERE $product_id = id";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $image = $row['image'];
  $name = $row['title'];
  $price = $row['price'];
  $desc = $row['description'];
  $slug = $row['slug'];
}

$item = array(
  "image" => $image,
  "id" => $product_id,
  "price" => $price,
  "name" => $name,
  "qty" => $qty,
  "slug" => $slug
);

function checkCartForItem($addItem, $cartItems) {
  if (is_array($cartItems)){
    foreach($cartItems as $key => $item) {
      if($item['name'] === $addItem)
        return $key;
    }
  }
  return false;
}

// if (!isset($_SESSION['cart'])) {
//   $_SESSION['cart'] = $_SESSION['cart'][];
// }

$itemExists = checkCartForItem($name, $_SESSION['cart']);
$_SESSION['itemExists'] = $itemExists;

if ($itemExists !== false){
     // item exists - increment quantity value by 1
     $_SESSION['cart'][$itemExists]['qty']+=$qty;
} else {
     // item does not exist - create new item and add to cart
     $_SESSION['cart'][] = $item;
}

// if (isset($_POST['update'])) {
//   //Updates Qty for all items
//   foreach ($_POST['items_qty'] as $itemID => $qty) {
//     //If the Qty is "0" remove it from the cart
//     if ($qty == 0) {
//       //Remove it from the cart
//       unset($_SESSION['SHOPPING_CART'][$itemID]);
//     }
//     else if($qty >= 1) {
//       //Update to the new Qty
//       $_SESSION['SHOPPING_CART'][$itemID]['qty'] = $qty;
//     }
//   }




header("Location: ../cart");
exit();
// }
?>
