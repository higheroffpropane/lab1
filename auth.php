<?php
$con = mysqli_connect("127.0.0.1","root", "root", "base") or die(mysqli_error());
$result = mysqli_query($con, 'SELECT username, token FROM dbase');
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (is_null($_COOKIE["our_token"])) {
	header('Location: /signin.php');
} else {
	foreach ($rows as $row) {
		if ($row['token'] == $_COOKIE["our_token"])
			header('Location: /profile.php');
		else
			continue;
	}
}
mysqli_close($con);
exit;