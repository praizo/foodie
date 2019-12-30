<?php


require("adminHeader.php");

$orderCount = $a->countOrders();

?>

    <div class="container-fluid">
    
        <div class="wrapper">
            <!-- Sidebar  -->
           <?php 

            require("adminSidebar.php");
            ?>

            <!-- Page Content  -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <!-- <div class="col"> -->
                            <button type="button" id="sidebarCollapse" class="btn btn-custom">
                                <i class="fas fa-align-left"></i>
                                <span>View Profile</span>
                            </button>
                        <!-- </div> -->
                        

                        <div class="col-8 offset-md-2 ">
                                <h2 class="text-custom">OUR HEALTHY MEALS</h2>
                            </div>
                    </div>
                </nav>

                <div class="row px-1 mx-0">                
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="card-columns">
                                    <div class="card text-center bg-custom text-white mb-3">
                                        <div class="card-body">
                                            <h3>Create Meal</h3>
                                            <h4 class="display-4">
                                                <i class="fas fa-plus-square"></i>
                                            </h4>
                                            <a href="createMeal.php" class="btn btn-outline-light btn-sm">Create</a>
                                        </div>
                                    </div>
                                    <div class="card text-center bg-custom text-white mb-3">
                                        <div class="card-body">
                                            <h3>Edit Meal</h3>
                                            <h4 class="display-4">
                                               <i class="fas fa-edit"></i> 
                                            </h4>
                                            <a href="displayMeal.php" class="btn btn-outline-light btn-sm">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card text-center bg-custom text-white mb-3">
                                        <div class="card-body">
                                            <h3>Delete Meal</h3>
                                            <h4 class="display-4">
                                                <i class="fas fa-trash-alt"></i> 
                                            </h4>
                                            <a href="deleteMeal.php" class="btn btn-outline-light btn-sm">Delete</a>
                                        </div>
                                    </div>
                                    <div class="card text-center bg-custom text-white mb-3">
                                        <div class="card-body">
                                            <h3>Orders</h3>
                                            <h4 class="display-4">
                                               <i class="fas fa-shopping-basket"></i> <?php  echo $orderCount; ?>
                                            </h4>
                                            <a href="adminOrder.php" class="btn btn-outline-light btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div class="card text-center bg-custom text-white mb-3">
                                        <div class="card-body">
                                            <h3>Posts</h3>
                                            <h4 class="display-4">
                                                <i class="fas fa-pencil-alt"></i> 6
                                            </h4>
                                            <a href="posts.html" class="btn btn-outline-light btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div class="card text-center bg-custom text-white mb-3">
                                        <div class="card-body">
                                            <h3>Staff</h3>
                                            <h4 class="display-4">
                                                <i class="fas fa-pencil-alt"></i> 6
                                            </h4>
                                            <a href="posts.html" class="btn btn-outline-light btn-sm">View</a>
                                        </div>
                                    </div>

                                </div>                              
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mt-2">
                    <div class="col-12 mt-0">
                        <footer class="d-flex justify-content-center bg-dark pt-4">
                            <p class="text-custom">Designed by Praise Adekunle &copy; Foodie 2019</p>
                        </footer>
                    </div>
                </div> -->
            </div>
        </div>
        
        <div class="overlay"></div>

    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="script.js"></script>
</body>

</html>