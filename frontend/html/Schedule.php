<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main_page.css">
    <script defer src="../js/schedule_room_buttons.js"></script>
    <title>Schedule</title>
</head>

<body>
    <main>
           <header>
                <section class="form-inputs">
                    <a href="../../index.html" class="form-item button-container"><button type="button" id="exit-button" class="main-button">ИЗХОД</button></a>
                    <?php 
                    session_start();
                    include "../../backend/Db.php";
                        $email = $_SESSION["email"];
                        $database = new DB();
                        $type = $database->checkUserType($email);
                        if($type == 'lector') {
                            echo '<a href="MainPage.php" class="form-item button-container"><button type="button" id="schedule-button" class="main-button">НАЗАД</button></a>';
                        }
                    ?>
                </section>
            </header>
        <fieldset class=" image-fieldset ">
            <section class="buttons_floors">
                <button class="btn_floor" id="btn0" onclick="showButtons(0,4)">0</button>
                <button class="btn_floor" id="btn1" onclick="showButtons(1,1)">1</button>
                <button class="btn_floor" id="btn2" onclick="showButtons(2,3)">2</button>
                <button class="btn_floor" id="btn3" onclick="showButtons(3,12)">3</button>
                <button class="btn_floor" id="btn4" onclick="showButtons(4,4)">4</button>
                <button class="btn_floor" id="btn5" onclick="showButtons(5,4)">5</button>
            </section>
            <img class="image" id="image" src="../../images/floor0.png" alt=" ">
            <script src="../js/dynamic_images.js"></script>

        </fieldset>
        <?php
            $database = new DB();
            if (isset($_POST["room-number"])) {
                $num = $_POST["room-number"];
                $ans = $database->returnReservations($num);
            }else{
                $ans = $database->returnReservations("");
            }
        ?>
        <fieldset class="book-fieldset button-container" id="buttons-fieldset">
            <section id="first-row" class="button-container">
            </section>
            <section id="second-row" class="button-container">
            </section>
        </fieldset>
    </main>

</body>

</html>