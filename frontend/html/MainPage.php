<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main_page.css">
        <script defer src="../js/dynamic_images.js"></script>
        <script defer src="../js/room_buttons.js"></script>
        <title>Main-Page</title>
    </head>

    <body>
        <main>
            <header>
                <section class="form-inputs">
                    <a href="../../index.html" class="form-item button-container"><button type="button" id="exit-button" class="main-button">ИЗХОД</button></a>
                    <a href="schedule.php" class="form-item button-container"><button type="button" id="schedule-button" class="main-button">ГРАФИК</button></a>
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
                <img class="image" id="image" src="../../images/floor0.png" alt="">
                <script src="../js/dynamic_images.js"></script>
            </fieldset>
            <script src="../js/validation.js"></script>
            <form method="POST" action="../../backend/reserveRoom.php">
                <fieldset class="book-fieldset">
                    <section class="form-inputs">
                        <section class="form-item">
                            <label for="date" class="date-label text">Дата:</label>
                            <input name="date" type="date" id="date" class="date-input" data-date-inline-picker="true"/>
                        </section>
                        <section class="form-item">
                            <label for="start_time" class="text">Начален час: </label>
                            <select name="start_time" id="start_time">
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                        </select>
                        </section>
                        <section class="form-item">
                            <label for="end_time" class="text">Краен час: </label>
                            <select name="end_time" id="end_time">
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            </select>
                        </section>
                    </section>
                    <section class="form-item">
                        <input id="room" type="text" name="answer"> <br> <br>
                        <button class="save-button" id="reserve-button" type="submit" name="action" value="Save">ЗАПАЗИ</button>
                        <button class="save-button" id="reserve-button" type="submit" name="action" value="Delete">ПРЕМАХНИ</button>
                    </section>
                </fieldset>
            </form>
            <fieldset class="book-fieldset button-container" id="buttons-fieldset">
                <section id="first-row" class="button-container">
                </section>
                <section id="second-row" class="button-container">
                </section>
            </fieldset>
            <?php 
                if (isset($_GET['error'])) {
                    $check = $_GET['error'];
                    if ($check == "emptyDate") {
                        echo "<p class='error'>Липсва дата!</p>";
                        exit();
                    }
                    if ($check == "pastDate") {
                        echo "<p class='error'>Датата не трябва да е минала!</p>";
                        exit();
                    }
                    if ($check == "room") {
                        echo "<p class='error'>Зала с такъв номер не може да се запази! Моля изберете друга!</p>";
                        exit();
                    }
                    if ($check == "pastTimes") {
                        echo "<p class='error'>Времето не трябва да е минало!</p>";
                        exit();
                    }
                    if ($check == "noRoom") {
                        echo "<p class='error'>Тази зала не е била запазвана по това време!</p>";
                        exit();
                    }
                    if ($check == "equalTimes") {
                        echo "<p class='error'>Времената за начало и край не трябва да съвпадат!</p>";
                        exit();
                    }
                    if ($check == "NotEqualEmails") {
                        echo "<p class='error'>Не можете да премахвате зала, която не сте запазили вие!</p>";
                        exit();
                    }
                    if ($check == "reservedRoom") {
                        echo "<p class='error'>Тази зала вече е резервирана по същото време! Моля изберете друга зала или друг час!</p>";
                        exit();
                    }
                    if ($check == "impossibleTimes") {
                        echo "<p class='error'>Времето за начало не трябва да е след времето за край!</p>";
                        exit();
                    }
                }
                if (isset($_GET['success'])) {
                    $check = $_GET['success'];
                    if ($check == "reservedRoom") {
                        echo "<p class='success'>Залата беше запазена успешно!</p>";
                        exit();
                    }
                    if ($check == "unreservedRoom") {
                        echo "<p class='success'>Резервацията беше премахната успешно!</p>";
                        exit();
                    }
                }
            ?>
        </main>

        <section class="dimmer non-visible "></section>

    </body>

</html>