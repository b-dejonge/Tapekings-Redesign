<?php

session_start();
// $search = $_POST['search'];
$search = mysqli_real_escape_string($_POST['search']);
$_SESSION['search'] = $search;

header("Location: ../account")
?>
