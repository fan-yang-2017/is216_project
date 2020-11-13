<?php
    require_once "common.php";

    // Get parameters passed from register.php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cfm_password = $_POST["confirm_password"];
    $error_arr = [];

    // Check if username is already taken
    $dao = new UserDAO();
    $status = $dao->retrieve($username);
    if($status){
        $error_arr[] = "Username is already taken.";
        $_SESSION['tmp_username'] = $username;
    }

    // Check if both passwords are the same
    if ($password != $cfm_password) {
        $error_arr[] = "Password and Confirm Password are not the same.";
    }

    // Username and Password should be at least 5 characters length
    if (strlen($username) <= 4 || strlen($password) <= 4) {
        $error_arr[] = "Username or Password must have at least 5 characters!";
    } 

    // If one or more fields have validation error
    if (count($error_arr) != 0) {
        $_SESSION['errors'] = $error_arr;
        header('Location: register.php');
        exit();
    }

    // Hash entered password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // If everything is checked. Create user Object and write to database
    $result = $dao->add($username, $hashed);

    if ($result) {
        // Success; redirect page
        $_SESSION["login_page"] = $username;
        header("Location: login.php");
        exit();
    }
?>