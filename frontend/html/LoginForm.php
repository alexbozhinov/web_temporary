<!DOCTYPE html>
<html lang="bg">

    <head>
        <title>Вход</title>
        <meta content="text/html" charset="UTF-8" http-equiv="Content-Type" />
        <link href="../css/login_form.css" rel="stylesheet" type="text/css">
        <title>Login-Page</title>
    </head>

    <body>
        <main>
            <header>
                <h1 id="system-name-header">ВХОД</h1>
            </header>
            <form method="POST" action="../../backend/Login.php" name="Form1">
                <fieldset class="main-page">
                    <section class="form-item input-container">
                        <input id="email" name="email" placeholder="Email" type="email" class="form-item">
                    </section>
                    <section class="form-item input-container">
                        <input id="passwd" name="password" placeholder="Парола" type="password" class="form-item">
                    </section>
                    <button type="submit" value="Send" name="button1" class="login-button">ВХОД</button>
                </fieldset>
            </form>
            <?php 
                if (!isset($_GET['error'])) {
                    exit();
                }
                else {
                    $check = $_GET['error'];
                    if ($check == "emptyEmail") {
                        echo "<p class='error'>Липсва email!</p>";
                        exit();
                    }
                    if ($check == "invalidEmail") {
                        echo "<p class='error'>Невалиден email!</p>";
                        exit();
                    }
                    if ($check == "emptyPassword") {
                        echo "<p class='error'>Липсва парола!</p>";
                        exit();
                    }
                    if ($check == "invalidPassword") {
                        echo "<p class='error'>Паролата трябва да бъде поне 8 символа дълга и трябва да включва поне една голяма, една малка буква и един специален символ!</p>";
                        exit();
                    }
                    if ($check == "unregisteredUser") {
                        echo "<p class='error'>Нерегистриран потребител!</p>";
                        exit();
                    }
                }
            ?>
        </main>
    </body>
</html>
