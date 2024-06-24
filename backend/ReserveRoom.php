<?php
    session_start();
    include "Db.php";
    $date = $_POST["date"];
    $curDate = date("Y-m-d"); 
    $curTime = date('H');
    if (empty($date)) {
        header("Location: ../frontend/html/MainPage.php?error=emptyDate");
        exit();
    }
    if ($date < $curDate) {
        header("Location: ../frontend/html/MainPage.php?error=pastDate");
        exit();
    }
    $start = $_POST["start_time"];
    $end = $_POST["end_time"];
    if ($curDate == $date && $end <= $curTime+1) {
        header("Location: ../frontend/html/MainPage.php?error=pastTimes");
        exit();
    }
    if ($start == $end) {
        header("Location: ../frontend/html/MainPage.php?error=equalTimes");
        exit();
    }
    else if ($start > $end) {
        header("Location: ../frontend/html/MainPage.php?error=impossibleTimes");
        exit();
    }
    $email = $_SESSION["email"];
    $num = $_POST["answer"];
    if ($num == "01" || $num == "02" || $num == "018" || $num == "019" || $num == "04" || $num == "03" || $num == "14" || $num == "13"
        || $num == "107" || $num ==  "101" || $num ==  "122" || $num ==  "120"
        || $num == "210" || $num == "217" || $num == "222" || $num == "200" || $num == "229"
        || $num == "302" || $num == "303" || $num == "304" || $num == "305" || $num == "306" || $num == "307" || $num == "308" || $num == "309" || $num == "310" || $num == "311" || $num == "313" || $num == "314" || $num == "326" || $num == "325" || $num == "323" || $num == "321" || $num == "320"
        || $num == "401" || $num == "403" || $num == "404" || $num == "405"
        || $num == "501" || $num == "514" || $num == "526" || $num == "500") {
        $database = new DB();
        if ($database->checkRoomIsReservedIn($date, $start, $end, $num) == true || $database->checkRoomIsReservedOut($date, $start, $end, $num) == true
        || $database->checkRoomIsReservedEqual($date, $start, $end, $num) == true || $database->checkRoomIsReservedInStart($date, $start, $num) == true
        || $database->checkRoomIsReservedInEnd($date, $end, $num) == true) { 
            if ($_POST['action'] == 'Save') {
                header("Location: ../frontend/html/MainPage.php?error=reservedRoom");
                exit();
            }
            else if ($_POST['action'] == 'Delete') {
                if ( $database->getEmail($date, $start, $end, $num) != $email) {
                    header("Location: ../frontend/html/MainPage.php?error=NotEqualEmails");
                    exit();
                }
                else {
                        $database->deleteRoom($date, $start, $end, $email, $num);
                        header("Location: ../frontend/html/MainPage.php?success=unreservedRoom");
                        exit();
                }
            }
        }
        else {
            if ($_POST['action'] == 'Save') {
                $database->insertRoom($date, $start, $end, $email, $num);
                header("Location: ../frontend/html/MainPage.php?success=reservedRoom");
                exit();
            }
            else if ($_POST['action'] == 'Delete') {
                header("Location: ../frontend/html/MainPage.php?error=noRoom");
                exit();
            }
        }
    } 
    else {
        header("Location: ../frontend/html/MainPage.php?error=room");
        exit();
    }
?>