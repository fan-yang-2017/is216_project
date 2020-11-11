<?php
    require_once "common.php";

    // Get parameters passed from login.php
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo $username;
    echo $password;
    $error_arr = [];

    // Get user information
    $dao = new UserDAO();
    $user = $dao->retrieve($username);

    // Check if user exists
    if ($user) {
        // Get stored hashed password
        $hashed = $user->getHashedPassword();

        // Check if entered password matches stored hashed password
        $result = false;
        $result = password_verify($password, $hashed); 
        if ($result) {
            // Create a session entry for successful login
            $_SESSION["user"] = $username;

            // Redirect to home page
            header("Location: home.php"); 
            exit;
        }
        else {
            $error_arr[] = "You have entered the wrong password.";
            $_SESSION['errors'] = $error_arr;
            header('Location: login.php');
            exit();
        }
    } 
    else {
        $error_arr[] = "User does not exist.";
        $_SESSION['errors'] = $error_arr;
        header('Location: login.php');
        exit();
    }
?>
