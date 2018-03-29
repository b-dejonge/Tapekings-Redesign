<?php

session_start();

$url = $_GET['url'];
$slug = preg_replace("/-+/", " ", $url);
$title = ucwords ($slug);

if ($url=="index.php") {
  $_SESSION['title'] = "Home";
  include 'pages/landing.php';
}

else {
  $_SESSION['title'] = $title;
  include 'pages/' . $url . '.php';
}

// else if ($url=="sports") {
//   $_SESSION['title'] = "Sports";
//   include 'pages/sports.php';
// }
//
// else if ($url=="outdoors") {
//   $_SESSION['title'] = "outdoors";
//   include 'pages/outdoors.php';
// }
//
// else if ($url=="store") {
//   $_SESSION['title'] = "Store";
//   include 'pages/store.php';
// }
//
// else if ($url=="store-outdoors") {
//   $_SESSION['title'] = "Store Outdoors";
//   include 'pages/store-outdoors.php';
// }
//
// else if ($url=="store-sports") {
//   $_SESSION['title'] = "Store Sports";
//   include 'pages/store-sports.php';
// }
//
// else if ($url=="red") {
//   $_SESSION['title'] = "Red Tape";
//   include 'pages/red.php';
// }
//
// else if ($url=="sports-designs") {
//   $_SESSION['title'] = "Sports Designs";
//   include 'pages/sports-designs.php';
// }
//
// else if ($url=="outdoors-designs") {
//   $_SESSION['title'] = "Outdoors Designs";
//   include 'pages/outdoors-designs.php';
// }
//
// else if ($url=="about-us") {
//   $_SESSION['title'] = "About Us";
//   include 'pages/about-us.php';
// }
//
// else if ($url=="contact-us") {
//   $_SESSION['title'] = "Contact Us";
//   include 'pages/contact-us.php';
// }
//
// else if ($url=="faq") {
//   $_SESSION['title'] = "FAQ";
//   include 'pages/faq.php';
// }
//
// else if ($url=="signin") {
//   $_SESSION['title'] = "Sign In";
//   include 'pages/signin.php';
// }
//
// else if ($url=="account") {
//   $_SESSION['title'] = "Account";
//   include 'pages/account.php';
// }
//
// else if ($url=="cart") {
//   $_SESSION['title'] = "Cart";
//   include 'pages/cart.php';
// }
//
// else if ($url=="checkout") {
//   $_SESSION['title'] = "Checkout";
//   include 'pages/checkout.php';
// }
//
// else {
//   $_SESSION['title'] = "Error";
//   include 'pages/404.php';
// }

?>
