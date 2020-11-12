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
        
        <title>Time Traveller - Home Page</title>

        <style>
            .card {
                height:420px;
            }

            .card img {  
                height:250px;
            }

            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
                background-color:floralwhite;
            }
            
            #main {
                position: relative;
                height: 72%;
                background-image: url("img/Screenshot\ 2020-10-24\ at\ 2.09.02\ PM\ 2.png");
                padding: 150px;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: scroll;
                background-size: cover;
            }  

            footer {
                margin-top: 10px;
            }
            
            * {
                box-sizing: border-box;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
    
            button {
                border: none;
                cursor: pointer;
            }        
        </style>
    </head>
    <body >
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

        <div class="container-fluid" id="main">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="display-3 text-uppercase text-white font-weight-bold">Save your time</h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="font-weight-light text-white mb-5">Know the current traffic situation</p>
                </div>
            </div>
        </div>
       
        <div class="container-fluid text-center" id="select">

            <!-- Three columns of text below the carousel -->
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card" style=" background-color: rgb(242, 247, 204); margin-top: 30px;">
                        <h4 class="font-weight-bold">Bus</h4>
                        <p class="card-text">Get Bus arrival time</p>
                        <img class="card-img-top" src="img/busstop.jpg" alt="Card image cap">
                        <div class="card-body">
                            <a class="btn  btn-outline-info" href="bus.php" role="button">Find Out &raquo;</a>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->

                <div class="col-lg-4">
                    <div class="card" style="background-color:lavenderblush; margin-top: 30px; ">
                        <h4 class="font-weight-bold">MRT</h4>
                        <p class="card-text">Know MRT breakdown info</p>
                        <img class="card-img-top" src="img/mrtphoto.jpg" alt="Card image cap">
                        <div class="card-body">
                          <a class="btn  btn-outline-info" href="mrt.php" role="button">Find Out  &raquo;</a>
                        </div>
                    </div>
                </div><!-- /.col-lg-4 -->

              <div class="col-lg-4">
                  <div class="card" style="background-color: rgb(228, 250, 250); margin-top: 30px; ">
                      <h4 class="font-weight-bold">Drive</h4>
                      <p class="card-text">Know latest Traffic info</p>
                      <img class="card-img-top" src="img/express.jpg" alt="Card image cap" >
                      <div class="card-body">
                          <!-- <a class="btn  btn-outline-info" href="roadwork.html" role="button">Road Work &raquo;</a> -->
                          <a class="btn  btn-outline-info" href="incident.php" role="button">Find Out &raquo;</a>
                      </div>
                  </div><!-- /.col-lg-4 -->
              </div><!-- /.row -->
            </div>
        </div>
        
        <!-- Footer-->
        <footer class="bg-light">
            <div class="container"><div class="small text-center text-muted">Time Traveller</div></div>
        </footer>
    </body>
</html>