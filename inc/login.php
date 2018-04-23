<?php

if (isset($_POST['loginButton'])) {
	require_once '../app/database.php';

	$username = mysqli_real_escape_string($conn, $_POST['emailAddress']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
  $url = mysqli_real_escape_string($conn, $_POST['url']);

	//Error handlers
	//Check if inputs are empty
	if (empty($username) || empty($password)) {
		header("Location: ../index.php?action=login&error=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?action=login&error=usernamenotfound");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				// $hashedPwdCheck = password_verify($password, $row['password']);
        $hashedPwdCheck = md5($password);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?action=login&error=invalidpassword");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					// session_destroy();
					session_start();
					$_SESSION['userID'] = $row['userID'];
					// $_SESSION['firstName'] = $row['firstName'];
					// $_SESSION['lastName'] = $row['lastName'];
          // $_SESSION['apt'] = $row['apt'];
					$_SESSION['username'] = $row['username'];
					header('Location: ../' . $url);
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}

?>
