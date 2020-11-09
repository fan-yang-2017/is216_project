<?php
    # Autoload and start session
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
    );
    session_start();

    # Get parameters passed from login.php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_err="";
    # Get user information
    $dao = new UserDAO();
    $user = $dao->retrieve($username);

    # Check if user exists 
    $success = false;
    if($user != null){
        # Get stored hashed password
        $hashed = $user->getHashedPassword();
        # Check if entered password matches stored hashed password
        $success = password_verify($password,$hashed); 
        if($success){
            
            # Create a session entry for successful login
            $_SESSION["user"] = $username;
            # Redirect to home page
            header("Location: Home.html"); 
            exit;
        }

    }
    # Failed login
    if (!$success){
        echo "Failed Login";
    }
?>
