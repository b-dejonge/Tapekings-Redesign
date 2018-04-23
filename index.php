<?php

session_start();

$url = $_GET['url'];
$_SESSION['url'] = $url;

if (isset($_GET['category'])) {
  $category = $_GET['category'];
  if (isset($_GET['product'])) {
    $product = $_GET['product'];
    $_SESSION['product'] = $product;
    if ($category=="tape") {
      $slug = preg_replace("/-+/", " ", $product);
      $title = ucwords ($slug);
      $_SESSION['title'] = $title;
      include 'pages/product.php';
      die();
    } else if ($category=="send-us-your-bat") {
      $title = ucwords ($product);
      $_SESSION['title'] = $title;
      include 'pages/productService.php';
      die();
    }
  }
}

if (isset($_GET['orderID'])) {
  $orderID = $_GET['orderID'];
  $_SESSION['orderID'] = $orderID;
  $_SESSION['title'] = "Order Overview";
  include 'pages/ordersFull.php';
  die();
}
if (isset($_GET['dashboardPath'])){
  $dashboardPath = $_GET['dashboardPath'];
  $title = ucwords ($dashboardPath);
  $_SESSION['title'] = $title;
  include 'pages/' . $dashboardPath . '.php';
  die();
}

if ($url=="index.php") {
  $_SESSION['title'] = "Home";
  include 'pages/landing.php';
  die();
}

if (file_exists("pages/" . $url . ".php")) {
  $slug = preg_replace("/-+/", " ", $url);
  $title = ucwords ($slug);
  $_SESSION['title'] = $title;
  include 'pages/' . $url . '.php';
}


?>
