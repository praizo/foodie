<?php 




require("foodie.php");
$r = new User;

 if (isset($_SESSION['user'])) {   
    $details = $r->getDetails($_SESSION['user']);
}

require("meal.php");

$q = new Meal;

$categories = $q->getCategory(); 

?>
<!DOCTYPE html>
<html  lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Foodie Menu</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Signika+Negative&display=swap" rel="stylesheet">
	</head>
	<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="row" >
                        <nav class="navbar navbar-expand-md navbar-light bg-dark w-100 p-3 text-white " >
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
                                    if (isset($_SESSION['user'])) {
                                        // echo "<a class='btn btn-custom mr-2 ml-auto my-2 my-sm-0 px-3 py-1' href='user.php' r>Welcome ".$details['cust_fname']."</a>";
                                        echo '
                                        <div class="dropdown mr-2 ml-auto my-2 my-sm-0 px-3 py-1">
                                            <a class="btn btn-custom  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               Welcome '.$details['cust_fname'] . '
                                            </a>
                                        
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="user.php">Profile</a>
                                                <a class="dropdown-item" href="logout.php">Logout</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>';
                                        echo "<a class='btn btn-custom ' href='logout.php'>logout</a>";

                                    }else  {
                                        echo "<button class='btn btn-custom mr-2 ml-auto my-2 my-sm-0' data-toggle='modal' data-target='#login'>Login</button>";
                                        echo " <button class='btn btn-custom' data-toggle='modal' data-target='#signup'>Sign Up</button>";
                                    }
                                   
                                
                                ?>
                            </div>
                        </nav>
                    </div>
                    
                </div>        
            </div>   
            <div class="row px-1 mx-0">
                    <div class="col-12 d-flex justify-content-center p-2">
                        <h2 class="text-custom">OUR HEALTHY MEALS</h2>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="col-12">
                                    <?php $x =0; foreach ($categories as $category) { $x++; ?>
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id='<?php echo "heading" .$x?>'>
                                                    <h2 class="mb-0 h3">
                                                        <button class="btn btn-transparent customTransparent font-weight-bold text-custom" type="button" data-toggle="collapse" data-target='<?php echo "#collapse" .$x?>' aria-expanded="true" aria-controls='<?php echo "collapse" .$x?>'>
                                                            <span class="h3"><?php  echo $category['mealcat_list'] ;?></span>         
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id='<?php echo "collapse" .$x?>' class="collapse show" aria-labelledby='<?php echo "heading" .$x?>' data-parent="#accordionExample">
                                                    <div class="card-columns">
                                                        <?php $mealLists = $q->displayMeal($category['mealcat_id']);
                                                            foreach ($mealLists as  $mealList) { ?>
                                                                <div class="card  border">
                                                                    <img src="mealUpload/<?php echo $mealList['meal_photo'];?>" class="card-img-top" alt="...">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title text-custom font-weight-bold"><?php   echo $mealList['meal_name']; ?></h5>                                                  
                                                                        <p class="card-text"><?php echo $mealList['meal_description'];?></p>
                                                                        <p class="card-text"><?php echo $mealList['meal_price'];?></p>
                                                                        <a href="#" class="btn btn-custom">Order Now</a>
                                                                    </div>
                                                                </div>
                                                        <?php } ?>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                        
                                </div>                                     
                            </div>




                            
                           
                        </div>
                    </div>
                </div>
                
            
            
                

            <div class="row">
                <div class="col-12 mt-0">
                    <footer class="d-flex justify-content-center">
                        <p>Designed by Praise Adekunle &copy; Foodie 2019</p>
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