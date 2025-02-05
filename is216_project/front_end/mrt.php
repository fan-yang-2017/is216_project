<?php
    require_once 'common.php';

    $username = '';
    if (isset($_SESSION["user"])) {
        $username = $_SESSION["user"];
    } else {
        header("Location: before_home.html");
    }
?>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!-- External CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        
        <title>Time Traveller - MRT</title>

        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
                background-color:floralwhite;
            }
            
            #mrt {
                height:100%;
                margin-top: 20px;
                justify-content: center;
            }

            footer {
                margin-top: 10px;
            }
            
            * {
                box-sizing: border-box;
            }

            #select {
                justify-content: center;
                margin-left: 75px;
                margin-top: 30px;
                margin-bottom: 30px;
            }

            #select.radio {
                padding-right: 20px;
            }

            h2 {
                text-align: center;
                font-family:monospace;
            }

            #result {
                margin:30px;
            }

            #map {
                height: 400px;
            }

            .msg{
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body onload="getTrainService()">
        <!-- Navigation-->
        <header>
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="home.php">
                    <img src="img/download.jpeg" width="30" height="30" alt="logo">
                    Time Traveller
                </a> 
                <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="bus.php">Bus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: blue;" href="mrt.php">MRT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="incident.php">Traffic Incident</a>
                        </li>
                    </ul>
                    <nav class="form-inline mt-2 mt-md-0">
                        Welcome, <?= $username?>! 
                        <img src="img/account.jpg" style="margin-left: 5px;" width="30" height="30" alt="logo">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </nav>
                </div>
            </nav>
        </header>
        <h2>MRT Breakdown Information</h2>
          
        <p align="right">
            <a style="margin-right: 40px" class="btn  btn-outline-info" href="demoMRT.php" role="button">Demo  &raquo;</a>
        </p>
        <div class="container">
            <div id="map"></div>
            <div class="msg" id="display"></div>
        </div>

        <!-- Footer-->
        <footer>
            <div class="container">
                <div class="small text-center text-muted">© 2020Copyright:Time Traveller</div>
            </div>
        </footer>

        <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPdZa8hZrEEt9WOlof-bcf9Tz_7NidC0k&callback=initMap">
        </script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        
        <!-- Custom Javascript -->
        <script type="text/javascript" src="../rec/TrainService.js"></script>
    </body>
</html>