<?php
session_start();
include "Db.php";
    $email = $_POST["email"];
    if (empty($email)) {
        header("Location: ../frontend/html/LoginForm.php?error=emptyEmail");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../frontend/html/LoginForm.php?error=invalidEmail");
        exit();
    }
    $_SESSION["email"] = $email;  
    $password = $_POST["password"];
    if (empty($password)) {
        header("Location: ../frontend/html/LoginForm.php?error=emptyPassword");
        exit();
    }
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        header("Location: ../frontend/html/LoginForm.php?error=invalidPassword");
        exit();
    }
    $database = new DB();
    if($database->checkUser($email, $password)) {
        $SESSION_["email"] = $email;
        $type = $database->checkUserType($email);
        $_SESSION["type"] = $type;
        if($type == 'lector') {
            header("Location: ../frontend/html/MainPage.php");
            exit();
        }
        else if($type == 'student')  {
            header("Location: ../frontend/html/Schedule.php");
            exit();
        }
    }
    else {
        header("Location: ../frontend/html/LoginForm.php?error=unregisteredUser");
        exit();
    }
?>