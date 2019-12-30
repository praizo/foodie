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
                                <button class="btn btn-custom mr-2 ml-auto my-2 my-sm-0" data-toggle="modal" data-target="#login">Login</button>
                                <button class="btn btn-custom" data-toggle="modal" data-target="#signup">Sign Up</button>
                                
                            </div>
                        </nav>
                    </div>
                    
                </div>        
            </div>

            <div class="row">
                <div class="offset-4 col-8">
                    <div class="row">
                        <div class="col-md-6 border shadow">
                            <form class="p-3" action="loginAdmin.php" method="POST">
                                <h4 class="text-custom pt-3">Foodie Staff</h4>
                                <hr>    
                                <div class="form-group">
                                    <input type="email" class="form-control" id="admin_Email" aria-describedby="emailHelp" placeholder="Enter email" name="admin_Email" required>
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="admin_Pwd" placeholder="Password" name="admin_Pwd" required>
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

            <?php require("footer.php"); ?>
            