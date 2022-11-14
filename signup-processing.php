<?php
    session_start();
    if (!isset($_COOKIE["our_token"]))
        header("Location: /signup.php");

	$con = mysqli_connect("127.0.0.1","root", "root", "base");

	$name = $_POST['username'];
	$pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$token = $_COOKIE["our_token"];

	$sql1 = "SELECT 'username', 'saltpass', 'token' FROM dbase WHERE username = '$name'";
	$tresult = mysqli_query($con, $sql1);
	if (mysqli_num_rows($tresult) != 0){
		$_SESSION['message'] = 'такое имя уже занято';
		header("Location: /signup.php",true,303);
		exit;
	}

	$sql = "INSERT INTO dbase (username, saltpass, token) VALUES('$name', '$pass', '$token')";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);

	if ($result==false) {
	    $_SESSION['message'] = 'ошибка соединения с БД';
	    header("Location: /signup.php",true,303);
	    }
    else {
        $_SESSION['message'] = 'регистрация прошла успешно!';
        header("Location: /profile.php",true,303);
    }

	exit;