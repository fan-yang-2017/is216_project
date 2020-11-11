<?php 
    // To auto-load class definitions from PHP files
    spl_autoload_register(function($class){
        $path = "../objects/" . $class . ".php";
        require_once $path;
    });

    // Session related stuff
    session_start();

    // Print errors based on session variable 'errors'
    function printErrors() {
        if (isset($_SESSION['errors'])){
            $html_str = "";
            
            foreach ($_SESSION['errors'] as $error) {
                $html_str .= "<div class='alert alert-danger' role='alert'>" 
                                . $error 
                            . "</div>";
            }
            
            echo $html_str;
            unset($_SESSION['errors']);
        }
    }

    function printSuccessRegistration() {
        if (isset($_SESSION['login_page'])) {
            $html_str = '<div class="alert alert-success" role="alert">
                            Registration Success! Proceed to Login
                        </div>';

            echo $html_str;
            unset($_SESSION['login_page']);
        }
    }
?>