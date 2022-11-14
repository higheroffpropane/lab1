<?php
    session_start();

	$name = $_POST['username'];
	$pass = $_POST['password'];
    $token = $_COOKIE["our_token"];

	$con = mysqli_connect("127.0.0.1","root", "root", "base");
	$sql = "SELECT * FROM dbase WHERE username = '$name'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 0) {
        $_SESSION['message'] = 'такого пользователя нет в БД';
		header('Location: /signin.php');
	} else {
		if (password_verify($pass, $row['saltpass']) == true) {
			mysqli_query($con, "UPDATE dbase SET token = '$token' WHERE username = '$name'");
			header('Location: /profile.php');
		}
		else {
			$_SESSION['message'] = 'неверный пароль';
			header('Location: /signin.php');
		}
	}
	exit;