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
        
        <title>Time Traveller - Bus</title>

        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
                background-color:floralwhite;
            }
            
            #bus{
                height:100%;
                padding-top: 30px;
            }

            footer{
                margin-top: 10px;
                position: fixed;
                bottom: 0;
                width: 100%;
            }

            .autocomplete{
                position: relative;
                display: inline-block;
            }

            .autocomplete-items {
                position: absolute;/*absolute position is needed to remove the element from the normal document flow*/
                border: 1px solid #d4d4d4;
                border-bottom: none;
                border-top: none;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 100%;
                left: 0;
                right: 31%;
            }

            .autocomplete-items div {
                padding: 10px;
                cursor: pointer;
                background-color: #fff; 
                border-bottom: 1px solid #d4d4d4; 
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
                            <a class="nav-link"  style="color: blue;" href="bus.php">Bus</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="mrt.php">MRT</a>
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

        <div class="container" id="bus">
            <h2>Bus Info</h2>
            
            <form autocomplete="off">
                <div class="autocomplete" name="busCodeForm">                   
                    <label for="bs_code">Plese enter bus stop code:</label>
                    <div class="form-inline">
                        <input type="text" maxlength="5" class="form-control" id="bs_code" name="bs_code" placeholder="eg.83189">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-primary" type="button" onclick="sendFormData()">Submit</button>
                    </div> 
                </div>
                  
                <br>
                <div id="div2" class="d-none">
                    <label for="sel2">Select Bus number</label>
                    <select multiple class="form-control" id="bus_display" onchange="getBusArrival(this)">
                    </select>
                </div>
            </form>

            <table class="d-none table table-dark" id="arrival_table" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">Bus Number</th>
                        <th scope="col">Bus Arrival Time</th>
                        <th scope="col">Next Bus Arrival Time</th>
                    </tr>
                </thead>
                <tbody id="arrival_time"></tbody>
                <tbody>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-secondary pull-right shadow-none" type="button" onclick='refresh(document.getElementById("bus_display"))'>Refresh</button></td>
                        <td></td>
                    </tr>
                </tbody>                
            </table>
        </div>

        <!-- Footer-->
        <footer>
            <div class="container">
                <div class="small text-center text-muted">© 2020Copyright:Time Traveller</div>
            </div>
        </footer>
        
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- Custom Javascript -->
        <script type="text/javascript" src="../rec/busstop.js"></script>
        <script type="text/javascript" src="../rec/bus_arrival.js"></script>
    </body>
</html>