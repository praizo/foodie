
<?php 
    require ("adminHeader.php");



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
                            <h2 class="text-custom">CREATE MEAL</h2>
                        </div>
                    </div>
                </nav>

                <div class="row px-2 mx-auto my-1">
                    <div class="offset-2 col-8  p-3">
                        <form class="border shadow p-3" action="createMealFlow.php" method="POST">
                            <h3 class="text-custom">Create Category</h3>
                            <hr>
                            <div class="form-row">
                                <?php  if(isset($_GET['m']) &&($_GET['m'] == 'success')){
                                        
                                        echo'<div class="alert alert-info alert-dismissible fade show col-md-12">';
                                        echo'Category: '. $_GET['name'].' added successfully ';
                                        echo'</div>';
                                        } else if(isset($_GET['m']) &&($_GET['m'] == 'fail')){
                                        echo'<div class="alert alert-dismissible fade show alert-warning">';
                                        echo'Failed to add category';
                                        echo'</div>';
                                }     

                                ?>
                                <div class="form-group col-md-6">
                                    
                                <label for=" mealcat" class="text-custom">Meal Category</label>
                                    <input type="text" id="mealcat" class="form-control" name="mealcat" placeholder="enter product category">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-custom">Create Category</button>

                        </form>
                    </div>
                </div>

                <div class="row px-2 mx-auto">
                    <div class="offset-2 col-8 p-3">

                        <form class="border shadow p-3 " enctype="multipart/form-data" action="createMealFlow2.php" method="POST">
                            <h3 class="text-custom">Create Meal</h3>
                            <hr>
                            <div class="form-row">
                                <?php  if(isset($_GET['p']) &&($_GET['p'] == 'success')){
                                        
                                        echo'<div class="alert alert-info col-md-12 alert-dismissible fade show">';
                                        echo'Meal: '. $_GET['meal'].' created successfully ';
                                        echo ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                        echo'</div>';
                                        } else if(isset($_GET['p']) &&($_GET['p'] == 'fail')){
                                        echo'<div class="alert alert-warning alert-dismissible fade show" >';
                                        echo'Failed to add category';
                                        echo ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                        echo'</div>';
                                }     

                                 ?>
                                <div class="form-group col-md-6">
                                    
                                    <label for="mealname" class="text-custom">Meal Name</label>
                                    <input type="text" class="form-control" id="mealname" placeholder="enter meal name" name="mealname" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mealdescription" class="text-custom">Meal Description</label>
                                    <input type="text" class="form-control" id="mealdescription" placeholder="enter meal description" name="mealdescription"  >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="meal_price" class="text-custom">Meal Price</label>
                                    <input type="number" class="form-control" id="meal_price" placeholder="enter meal price" name="mealprice">
                                </div>
                               
                                <div class="form-group col-md-4">
                                    <label for="mealcategory" class="text-custom">Meal Category</label>
                                    <select name="mealcategory" class="form-control" id="mealcategory" >
                                        <option selected>-- Chose Meal Category --</option>
                                        <?php foreach ($categories as $category) {?>
                                            <option value="<?php echo $category['mealcat_id']; ?>"> <?php echo $category['mealcat_list']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                            </div>
                    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="mealphoto" class="text-custom">Upload Meal Photo</label>
                                    <input type='file' name='mealphoto' id="mealphoto" class="form-control-file"> 
                                </div>
                            </div>
                            
                    
                        
                            <button type="submit" class="btn btn-custom">Create Meal</button>
                        </form>
                    </div>
                </div> 
               
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