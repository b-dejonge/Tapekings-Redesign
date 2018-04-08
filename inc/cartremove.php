<?php

$key = $_POST['key'];

session_start();
unset($_SESSION['cart'][$key]);
$_SESSION['cart'] = array_values($_SESSION['cart']);

exit();
?>
