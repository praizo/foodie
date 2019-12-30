<?php

    require("foodie.php");
    $r = new User;

    if (!isset($_SESSION['user'])) {
        header("location: menu.php");
    }

    $details = $r->getDetails($_SESSION['user']);
    // print_r($details);

    
    require("meal.php");

    $q = new Meal;

    $categories = $q->getCategory(); 

    require("order.php");

    $a = new Orders;

    $orderDatas = $a->getCustOrder($_SESSION['user']);
?> 



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>User</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row ">
                <div class="col-md">
                    <div class="row" >
                        <nav class="navbar navbar-expand-md navbar-light bg-dark w-100 p-3 fixed-top">
                            <a class="navbar-brand text-white font-weight-bold ml-2 pl-2 " href="home.php">Foodie </a>
                            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon text-light"></span>
                            </button>
                            <div class="collapse navbar-collapse " id="navbarCollapse">
                                <ul class="navbar-nav ml-2 pl-2 mr-2">
                                    <li class="nav-item">
                                        <a class="nav-link  font-weight-bold text-white" href="home.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  font-weight-bold text-white" href="menu.php">Menu</a>
                                    </li>
                                    
                                </ul>
                                <form class="form-inline mt-2 mt-md-0 ">
                                    <input class="form-control mr-sm-2 w-sm-75 w-md-100 rounded" type="text" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-custom my-2 my-sm-0 pl-2" type="submit">Search</button>
                                </form>

                                <?php 
                                    if (isset($_SESSION['user'])) {?>
                                        <button type="button" class='btn btn-custom mr-2 ml-auto my-2 my-sm-0 px-3 py-1' data-toggle="modal" data-target="#staticBackdrop">
                                            <i class='fas fa-shopping-cart h3'></i>
                                            <span class='badge badge-light ' id="countNo">
                                                <?php if(isset($_SESSION['meal_cart'])){
                                                    echo count($_SESSION['meal_cart']);
                                                }else{
                                                    echo 0;
                                                }?>
                                            </span>
                                        </button>
                                    <?php  } else  { ?>

                                        
                                        <button class='btn btn-custom mr-2 ml-auto my-2 my-sm-0' data-toggle='modal' data-target='#login'>Login</button>
                                        <button class='btn btn-custom' data-toggle='modal' data-target='#signup'>Sign Up</button>
                                    <?php } ?>
                                
            
                                
                            </div>
                        </nav>
                    </div>
                    
                </div>        
        </div>
    </div>