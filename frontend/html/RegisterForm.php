<!DOCTYPE html>
<html lang="bg">

    <head>
        <meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
        <link href="../css/register_form.css" rel="stylesheet" type="text/css">
        <title>Register-Page</title>
    </head>

    <body>
        <main>
            <header>
                <h1 id="system-name-header">РЕГИСТРАЦИЯ</h1>
            </header>
            <form class="form-container" method="POST" action="../../backend/Register.php">
                <fieldset class="main-page">
                    <section class="form-item input-container">
                        <input id="first_name" name="first_name" placeholder="Име" type="text" class="form-item">
                    </section>
                    <section class="form-item input-container">
                        <input id="last_name" name="last_name" placeholder="Фамилия" type="text" class="form-item">
                    </section>
                    <section class="form-item input-container">
                        <input id="email" name="email" placeholder="Email" type="email" class="form-item">
                    </section>
                    <section class="form-item input-container">
                        <input id="passwd_1" name="password_1" placeholder="Парола" type="password" class="form-item">
                    </section>
                    <section class="form-item input-container">
                        <input id="passwd_2" name="password_2" placeholder="Повтори парола" type="password" class="form-item">
                    </section>
                    <section class="form-item input-container">
                        <select name="user_type" id="select-user" class="form-item">
                            <option value="" disabled selected hidden>Вие сте</option>
                            <option value="lector">Преподавател</option>
                            <option value="student">Студент</option>
                        </select>
                    </section>
                    <button class="register-button">РЕГИСТРИРАЙ МЕ</button>
                </fieldset>
            </form>
            <?php 
                if (!isset($_GET['error'])) {
                    exit();
                }
                else {
                    $check = $_GET['error'];
                    if ($check == "emptyFirstName") {
                        echo "<p class='error'>Липсва име!</p>";
                        exit();
                    }
                    if ($check == "invalidFirstName") {
                        echo "<p class='error'>Името трябва да съдържа само букви!</p>";
                        exit();
                    }
                    if ($check == "emptyLastName") {
                        echo "<p class='error'>Липсва фамилия!</p>";
                        exit();
                    }
                    if ($check == "invalidLastName") {
                        echo "<p class='error'>Фамилията трябва да съдържа само букви!</p>";
                        exit();
                    }
                    if ($check == "emptyEmail") {
                        echo "<p class='error'>Липсва email!</p>";
                        exit();
                    }
                    if ($check == "invalidEmail") {
                        echo "<p class='error'>Невалиден email!</p>";
                        exit();
                    }
                    if ($check == "emptyPasswd_1") {
                        echo "<p class='error'>Липсва парола!</p>";
                        exit();
                    }
                    if ($check == "invalidPassword") {
                        echo "<p class='error'>Паролата трябва да бъде поне 8 символа дълга и трябва да включва поне една голяма, една малка буква и един специален символ!</p>";
                        exit();
                    }
                    if ($check == "emptyPasswd_2") {
                        echo "<p class='error'>Липсва повторена парола!</p>";
                        exit();
                    }
                    if ($check == "unequalPasswords") {
                        echo "<p class='error'>Паролите трябва да съвпадат!</p>";
                        exit();
                    }
                    if ($check == "emptyType") {
                        echo "<p class='error'>Липсва тип потребител!</p>";
                        exit();
                    }
                }
            ?>
        </main>
        <script src=""></script>
    </body>
</html>