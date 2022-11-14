<?php
    session_start();
    $token = rand(1000000, 99999999);
    setcookie("our_token", $token, time() + 60*5);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>авторизация</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Авторизация</h1>

        <form action="signin-processing.php" method="post">
            <label>логин</label>
            <input type="text" name="username" placeholder="введите логин" pattern="[a-zA-Z0-9]{,16}+" required /><br>
            <label>пароль</label>
            <input type="password" name="password" placeholder="введите пароль" required /><br>
            <button type="submit">войти</button>
            <button formaction="signup.php" formnovalidate
            >еще не зарегистрированы?</button>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </body>
</html>