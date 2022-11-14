<?php
    session_start();
    $token = rand(1000000, 99999999);
    setcookie("our_token", $token, time() + 60*5);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>регистрация</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Регистрация</h1>

        <form action="signup-processing.php" method="post">
            <label>логин</label>
            <input type="text" name="username" placeholder="введите логин" pattern="[a-zA-Z0-9]+" required /><br>
            <label>пароль</label>
            <input type="password" name="password" placeholder="введите пароль" required /><br>
            <h2>требования: a-z, A-Z, 0-9, не более 16 символов</h2>
            <button type="submit">зарегистрироваться</button>
            <button formaction="signin.php" formnovalidate
            >уже зарегистрированы?</button>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </body>
</html>