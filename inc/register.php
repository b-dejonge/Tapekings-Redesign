<?php

if (isset($_POST['register-submit'])){
  require_once '../app/database.php';

  $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
  // $apt = mysqli_real_escape_string($conn, $_POST['apt']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  //Error handlers
  //Check for empty fields
  if (empty($firstName) || empty($lastName) || empty($username) || empty($password)) {
    echo $firstName . $lastName . $username . $password;die();
    header("Location: ../register?error=empty");
    exit();
  } else {
    //Check if input characters are valid
    if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
      header("Location: ../register?error=invalidname");
      exit();
      } else {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          header("Location: ../register?error=usernametaken");
        } else {
          //Hashing the password
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          //Insert the user into the database
          $sql = "INSERT INTO users (firstName, lastName, username, password)
                  VALUES ('$firstName','$lastName','$username','$hashedPassword');";
          mysqli_query($conn, $sql);
          $sql = "SELECT * FROM users WHERE username='$username'";
      		$result = mysqli_query($conn, $sql);
      		$resultCheck = mysqli_num_rows($result);

      			if ($row = mysqli_fetch_assoc($result)) {
      					//Log in the user here
                session_start();
      					$_SESSION['userID'] = $row['userID'];
      					$_SESSION['firstName'] = $row['firstName'];
      					$_SESSION['lastName'] = $row['lastName'];
      					$_SESSION['username'] = $row['username'];
      					header("Location: ../account");
      					exit();
      				}
      			}
          }
        }
} else {
  header("Location: ../store");
  exit();
}

?>
