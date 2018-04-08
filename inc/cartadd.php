<?php

// if (isset($_POST['add-to-cart'])){
require_once '../app/database.php';
session_start();
$id = $_POST['id'];
$qty = $_POST['qty'];

// $price = $_POST['price'];
// array_push($_SESSION['cart'],$item,$price);
// $_SESSION['cart'] = array();

$sql = "SELECT * FROM products WHERE $id = id";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  $image = $row['image'];
  $name = $row['title'];
  $price = $row['price'];
  $desc = $row['description'];
  $slug = $row['slug'];
}

$_SESSION['cart'][] = array(
   "image" => $image,
   "id" => $id,
   "price" => $price,
   "name" => $name,
   "desc" => $desc,
   "qty" => $qty,
   "slug" => $slug
);

header("Location: ../cart");
exit();
// }
?>
