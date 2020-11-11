<?php
    require_once "common.php";

    $tmp_username = '';
    if (isset($_SESSION['tmp_username'])) {
        $tmp_username = $_SESSION['tmp_username'];
    }
?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <title>Time Traveller - Sign Up</title>

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            html, body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                width: 100%;
                padding: 15px;
                margin: auto;
            }

            .form-signin .checkbox {
                font-weight: 400;
            }

            .form-signin .form-control {
                position: relative;
                box-sizing: border-box;
                height: auto;
                padding: 10px;
                font-size: 16px;
            }

            .form-signin .form-control:focus {
                z-index: 2;
            }

            .form-signin input[type="text"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
                max-width: 330px;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                max-width: 330px;
            }   
        </style>
    </head>

    <body class="text-center">
        <form class="form-signin d-block" method="post" action="process_register.php">
            <img class="mb-4" src="img/download.jpeg" alt="" width="72" height="72">
            <h3 class="mb-3 font-weight-normal">Sign up for New Account</h3>
            <div class="form-group">
                <input type="text" name="username" class="form-control mx-auto" value="<?= $tmp_username?>" placeholder="Enter Username" required autofocus>
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control mx-auto" placeholder="Enter Your Password" required>
            </div>

            <div class="form-group">        
                <input type="password" name="confirm_password" class="form-control mx-auto" placeholder="Confirm Your Password" required>
            </div>
        
            <input type="submit" name="submit" class="btn btn-primary" value="Register">
            <p> Already have an account? <a href = "login.php">Login here</a></p>
            <?php printErrors();?>
        </form>
    </body>
</html>
