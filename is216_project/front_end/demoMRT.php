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
        
        <title>Time Traveller - MRT Demo</title>

        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
                background-color:floralwhite;
            }
            
            #mrt{
                height:100%;
                margin-top: 20px;
                justify-content: center;
            }

            footer{
                margin-top: 10px;
            }
            
            * {
                ox-sizing: border-box;
            }

            #select{
                  justify-content: center;
                  margin-left: 75px;
                  margin-top: 30px;
                  margin-bottom: 30px;
            }

            #select.radio{
                padding-right: 20px;
            }

            h3{
                margin-left:50px;
            }

            h2{
                text-align:center;    
                font-family:monospace;
            }

            #result{
                margin:30px;
            }

            #map {
                height: 400px;
            }
        </style>
    </head>

    <body>
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
            <a style="margin-right: 40px"class="btn  btn-outline-info" href="mrt.php" role="button">Back to Live  &raquo;</a>
        </p>
        <div class="container">
            <div id="map"></div>
        </div>
               
        <div class="row justify-content-center" > 
            <h3>Select MRT Line</h3>
        </div>
            
        <div class="row" id="select"> 
            <form>
                <label for="line1">
                    <input type="checkbox" id="line1" name="mrt_line" value="EWL" onclick="getParticularTrainService()"> East-West Line <span style="color:green;font-weight: bold;">EWL</span>
                </label>
                <br>
                <label for="line2">
                    <input type="checkbox" id="line2" name="mrt_line" value="NSL" onclick="getParticularTrainService()"> North-South Line <span style="color:red;font-weight: bold;">NSL</span>
                </label>
                <br>
                <label for="line3">
                    <input type="checkbox" id="line3" name="mrt_line" value="NEL" onclick="getParticularTrainService()"> North-East Line <span style="color:purple;font-weight: bold;">NEL</span>
                </label>
                <br>
                <label for="line4">
                    <input type="checkbox" id="line4" name="mrt_line" value="CCL" onclick="getParticularTrainService()"> Circle Line <span style="color:darkorange;font-weight: bold;">CCL</span>
                </label>
                <br>
                <label for="line5">
                    <input type="checkbox" id="line5" name="mrt_line" value="CGL" onclick="getParticularTrainService()"> Circle Line (for Changi Extension) <span style="color:darkorange;;font-weight: bold;">CGL</span>
                </label>
                  <br>
                <label for="line6">
                    <input type="checkbox" id="line6" name="mrt_line" value="CEL" onclick="getParticularTrainService()"> Circle Line (for Circle Line Extension) <span style="color:darkorange;font-weight: bold;">CEL</span>
                </label>
                <br>
                <label for="line7">
                    <input type="checkbox" id="line7" name="mrt_line" value="DTL" onclick="getParticularTrainService()"> Downtown Line <span style="color:blue;font-weight: bold;">DTL</span>
                </label>
            </form>
        </div> 
        <div class="row" id="result">
                
        </div>  
       
        <div class="msg" id="display" style="text-align: center; margin-left: 30px; margin-right: 30px"></div>
        <!-- Footer-->
        <footer class="bg-light">
            <div class="container"><div class="small text-center text-muted">Time Traveller</div></div>
        </footer>
        
        <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3nD9MqQk2qELQG2RWfHixIHnX1MzQ86o&callback=initMap">
        </script>
        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        
         <!-- Custom Javascript -->
        <script src="../rec/TrainService.js"></script>
    </body>
</html>