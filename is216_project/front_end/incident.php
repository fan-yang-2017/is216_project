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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

        <title>Time Traveller - Traffic Incident</title>

        <style>
            #map {
                height: 400px;
            }

            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
                background-color:floralwhite;
            }
             
            footer {
                margin-top: 10px;
            }

            * {
                box-sizing: border-box;
            }
        </style>
    </head>

    <body onload="getTrafficIncidents()">
        <!-- Navigation-->
        <header>
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="home.php">
                    <img src="img/download.jpeg" width="30" height="30" alt="logo">
                    Time Traveller
                </a> 

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="bus.php">Bus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mrt.php">MRT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: blue;" href="incident.php">Traffic Incident</a>
                        </li>
                    </ul>

                    <nav class="form-inline mt-2 mt-md-0">
                        Welcome, <?= $username?>! 
                        <a class="navbar-brand" href="logout.php">
                            <img src="img/account.jpg" style="margin-left: 5px;" width="30" height="30" alt="logo">
                        </a>
                    </nav>
                </div>
            </nav>
        </header>


        <div class="container">
            <div class="row"></div>
                <h2 style="text-align: center;">Traffic Incident</h2>
                <div id="map"></div>
            </div>

            <h2 style="text-align: center;">Incident list</h2>
            <div class="row justify-content-center">
                <p><span style="color: red;">*</span>Click the radio button to show the incident on the map</p>
                <div id="incident_table" style="width:90%"> 

                </div>       
            </div>         
        </div> 
        
        <!-- Footer-->
        <footer class="bg-light">
            <div class="container"><div class="small text-center text-muted">Time Traveller</div></div>
        </footer>

        <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3nD9MqQk2qELQG2RWfHixIHnX1MzQ86o&callback=initMap">
        </script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <!-- Custome Javascript -->
        <script type='text/javascript' src="../rec/traffic_incidents.js"></script>
    </body>
</html>