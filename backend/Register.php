<?php
session_start();
include "Db.php";
    $first_name = $_POST["first_name"];
    if (empty($first_name)) {
        header("Location: ../frontend/html/RegisterForm.php?error=emptyFirstName");
        exit();
    }
    if (!preg_match ("/^[a-zA-z]*$/", $first_name) ) {  
        header("Location: ../frontend/html/RegisterForm.php?error=invalidFirstName");
        exit();
    }
    $last_name = $_POST["last_name"];
    if (empty($last_name)) {
        header("Location: ../frontend/html/RegisterForm.php?error=emptyLastName");
        exit();
    }
    if (!preg_match ("/^[a-zA-Z]*$/", $last_name) ) {  
        header("Location: ../frontend/html/RegisterForm.php?error=invalidLastName");
        exit();
    }
    $email = $_POST["email"];
    if (empty($email)) {
        header("Location: ../frontend/html/RegisterForm.php?error=emptyEmail");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../frontend/html/RegisterForm.php?error=invalidEmail");
        exit();
    }
    $passwd_1 = $_POST["password_1"];
    if (empty($passwd_1)) {
        header("Location: ../frontend/html/RegisterForm.php?error=emptyPasswd_1");
        exit();
    }
    $uppercase = preg_match('@[A-Z]@', $passwd_1);
    $lowercase = preg_match('@[a-z]@', $passwd_1);
    $number = preg_match('@[0-9]@', $passwd_1);
    $specialChars = preg_match('@[^\w]@', $passwd_1);
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($passwd_1) < 8) {
        header("Location: ../frontend/html/RegisterForm.php?error=invalidPassword");
        exit();
    }
    $passwd_2 = $_POST["password_2"];
    if (empty($passwd_2)) {
        header("Location: ../frontend/html/RegisterForm.php?error=emptyPasswd_2");
        exit();
    }
    if($passwd_1 != $passwd_2) {
        header("Location: ../frontend/html/RegisterForm.php?error=unequalPasswords");
        exit();
    }
    $type = $_POST["user_type"];
    if (empty($type)) {
        header("Location: ../frontend/html/MainPage.php?error=emptyType");
        exit();
    }
    $database = new DB();
    $database->insertUser($first_name, $last_name, $email, $passwd_1, $type);
?>