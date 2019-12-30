<?php 


require("meal.php");

$q = new Meal;

$meals =  $q->displayMealHome();


?>




<!DOCTYPE html>
<html  lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Foodie</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Signika+Negative&display=swap" rel="stylesheet">
        
	</head>
	<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md" id="overlay">
                    <div class="row" >
                        <nav class="navbar navbar-expand-md navbar-light bg-transparent fixed-top  transition p-3 " id="bag">
                            <a class="navbar-brand text-white font-weight-bold ml-2 pl-2 textcol" href="#">Foodie </a>
                            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon text-light"></span>
                            </button>
                            <div class="collapse navbar-collapse " id="navbarCollapse">
                                <ul class="navbar-nav ml-3 mr-3">
                                    <li class="nav-item ">
                                        <a class="nav-link text-white font-weight-bold textcol" href="home.php">Home</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link text-white font-weight-bold textcol" href="menu.php">Menu</a>
                                    </li>
    
                                </ul>
                                <form class="form-inline mt-2 mt-md-0 ">
                                    <input class="form-control mr-sm-2 w-sm-75 w-md-100 rounded" type="text" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-custom my-2 my-sm-0 pl-2" type="submit">Search</button>
                                </form>
                                <button class="btn btn-custom mr-2 ml-auto my-2 my-sm-0" data-toggle="modal" data-target="#login">Login</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#signup">Sign Up</button>
                                
                            </div>
                        </nav>
    
                        <div class="mr-auto row " id="overlay-jumbo" >
                            <div class="col-md text-sm-left text-white bg-transparent jumbotron ">
                                <h1 class="display-4" >Good food choices are <br> good investments</h1>
                                <hr>
                                <p class="font-weight-bold lead text-white">
                                    There is a powerful need for symbolism, and that means the architecture <br> 
                                    must have something that appeals to the human heart. 
                                </p><br><br>
                                <a class="btn btn-custom btn-lg" href="user.php">
                                    Order Now
                                </a>							
                            </div>
                        </div>
                    </div>
                    
                </div>        
            </div>   
            
            <div class="row px-5 py-5 w-75 mx-auto">
                <div class="col-12 text-custom text-center">
                    <h2>Explore Our Foods</h2>    
                    <p> Foodie is in the business of making delicious meals. It seeks to use high-quality raw ingredients, classic cooking techniques and distinctive interior design to bring elements of fine dining to quick-service restaurants</p>
                </div>
            </div>

            <div class="row px-5">
                <div class="col-12 ">

                    <div class="card-columns">
                        <?php  foreach ($meals as  $meal) { ?>
                                <div class="card  border">
                                    <img src="mealUpload/<?php echo $meal['meal_photo'];?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-custom font-weight-bold"><?php   echo $meal['meal_name']; ?></h5>                                                  
                                        <p class="card-text" ><?php echo $meal['meal_description'];?></p>
                                        <p class="card-text">&#8358; <?php echo $meal['meal_price'];?></p>
                                        <a href="#" class="btn btn-custom">Order Now</a>
                                    </div>
                                </div>
                        <?php } ?>  
                    </div>

                    <div class="card w-100 border-0 p-0 m-0 ">
                        <div class="card-body d-flex justify-content-center">
                            <a class="btn btn-lg py-3 btn-custom" href="user.php">Explore all food</a>
                        </div>
                    </div>             
                </div> 
            </div>    
            
            <div class="row px-5 py-5">
                <div class="col-12">
                    <div class="row p-3 text-custom">
                        <div class="col-12">
                            <h1 class="py-2 text-center" >Our Services</h1>
                        </div>
                        <div class="col-12 my-2 rounded ">
                            <div class="media row">
                                <img src="img/order.svg" class="align-self-center mr-3 col-md-6" alt="..." height="200px">
                                <div class="media-body my-auto col-md-6">
                                    <h5 class="mt-0 text-sm-center text-md-left">Order</h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 my-2 rounded ">
                            <div class="media row">
                                <div class="media-body my-auto col-md-6 order-md-1 order-2">
                                    <h5 class="mt-0">Serene Environment</h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                </div>
                                <img src="img/dinner.svg" class="align-self-center mr-3 col-md-6 order-md-2 order-1" alt="..." height="200px">
                            </div>
                        </div>

                        <div class="col-12 my-2 rounded ">
                            <div class="media row">
                                <img src="img/chef.svg" class="align-self-center mr-3 col-md-6" alt="..." height="200px">
                                <div class="media-body my-auto col-md-6">
                                    <h5 class="mt-0 text-sm-center text-md-left text-custom">World Class Chef</h5>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row px-5 py-5">
                <div class="col-md-6 col-sm-12 py-3   border-top border-bottom border-left rounded-top rounded-bottom rounded-left">
                    <h3 class="text-custom text-center">
                        CONTACT US
                    </h3>
                    <h5>
                        2, Irewole street, off Allen Avenue, Ikeja, Lagos
                    </h5>
                    <p>
                        Email: tzpraise@gmail.com </p>
                    <p>
                        Telephone: +2348036205135, +2347030511587.
                    </p><br>
                
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4367935782207!2d3.357827414317091!3d6.592507424187358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b9240be0ee2ed%3A0x4172066e0f2768cc!2s2%20Irewole%20St%2C%20Allen%2C%20Ikeja!5e0!3m2!1sen!2sng!4v1571631075221!5m2!1sen!2sng" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 py-3  border-top border-bottom border-right rounded-top rounded-bottom rounded-left">
                    <h3 class="text-custom text-center">Leave us a message</h3>
                    <form class="py-2">
                        <div class="form-group pt-2">
                            <label for="fname">Enter Full Name</label>
                            <input type="text" class="form-control" id="fname" placeholder="enter fullname" required>
                        </div>
                        <div class="form-group pt-2">
                            <label for="emailAdd">Email address</label>
                            <input type="email" class="form-control" id="emailAdd" placeholder="name@example.com" required>
                        </div>
                        
                        <div class="form-group py-2">
                            <label for="complaint">Register Complaint</label>
                            <textarea class="form-control" id="complaint" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom btn-lg w-100">Send</button>

                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-0">
                    <footer class="d-flex justify-content-center bg-dark pt-4">
                        <p class="text-white">Designed by Praise Adekunle &copy; Foodie 2019</p>
                    </footer>
                </div>
            </div>
        </div>

        

        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                            <?php  if(isset(($_GET['status']))){
                                        
                                        echo'  <small class="form-text text-danger">incorrect email or password</small>';
                                        } ?>
                              
                                <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Enter email" name="userEmail" required>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="userPwd" placeholder="Password" name="userPwd" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-custom">Login</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="signup.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="fname" placeholder="enter firstname" name="fname" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="lname" placeholder="enter lastname" name="lname" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control" id="pwd1" placeholder="Password" name="pwd1" required> 
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control" id="pwd2" placeholder="Password" name="pwd2" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="phoneNo" placeholder="phone number" name="phoneNo" required>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    I agree to terms and conditions of usage on this website.
                                </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-custom">Sign Up</button>
                        </form>      
                    </div>
                </div>
            </div>
        </div>

       
            


		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="script.js"></script>

	</body>
</html>