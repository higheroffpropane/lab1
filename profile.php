<?php
    session_start();
    if (!isset($_COOKIE["our_token"]))
        header("Location: /signup.php");
	$con = mysqli_connect("127.0.0.1","root", "root", "base") or die(mysqli_error());
	$token = $_COOKIE["our_token"];
	$sql = "SELECT * FROM dbase WHERE token = '$token' limit 1";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) == 0)
		header("Location: /signin.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>профиль</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <p>вы вошли в аккаунт</p>

        <?php
        if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
        <p class = logout><a href="signin.php">выйти из системы</a></p>

    </body>
</html>