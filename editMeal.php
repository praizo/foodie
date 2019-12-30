
<?php 
    require ("adminHeader.php");
    $b = $_GET['id'];
    $meals = $q->getMealDetails($b);
    print_r($meals['mealcat_id']);
    $mealcatList = $q->editMealCat($meals['mealcat_id']);


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
                            <h2 class="text-custom">EDIT MEAL</h2>
                        </div>
                    </div>
                </nav>

              
                <div class="row px-2 mx-auto ">
                    <div class="offset-2 col-8 p-3">

                        <form class="border shadow p-3" enctype="multipart/form-data" action="editMealFlow.php" method="POST">
                            <h3 class="text-custom">Edit Meal</h3>
                            <hr>
                            <div class="form-row">
                                <?php  if(isset(($_GET['status']))){
                                        
                                        echo'<div class="alert alert-info alert-dismissible fade show col-md-12">';
                                        echo'Meal: '. $meals['meal_name'].' edited successfully';
                                        echo'<a href="displayMeal.php" style="text-decoration: underline; float: right;">Proceed to menu</a>';
                                        echo'</div>';
                                        } 
                                //         else if(isset($_GET['id']) &&($_GET['status'] == 'failed')){
                                //         echo'<div class="alert alert-warning">';
                                //         echo'Failed to edit meal card';
                                //         echo'</div>';
                                // }     

                                ?>
                                <div class="form-group col-md-6">
                                    
                                    <label for="mealname" class="text-custom">Meal Name</label>
                                    <input type="text" class="form-control" id="mealname" placeholder="enter meal name" name="mealname" value="<?php echo $meals['meal_name'];?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mealdescription" class="text-custom">Meal Description</label>
                                    <input type="text" class="form-control" id="mealdescription" placeholder="enter meal description" name="mealdescription" value="<?php echo $meals['meal_description'];?>" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="meal_price" class="text-custom">Meal Price</label>
                                    <input type="number" class="form-control" id="meal_price" placeholder="enter meal price" name="mealprice" value="<?php echo $meals['meal_price'];?>">
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="mealcategory" class="text-custom">Meal Category</label>
                                    <select name="mealcategory" class="form-control" id="mealcategory" >
                                        <option value="<?php echo $meals['mealcat_id'];?>" selected><?php echo $mealcatList['mealcat_list']; ?></option>
                                        <?php foreach ($categories as $category) {?>
                                            <option value="<?php echo $category['mealcat_id']; ?>"> <?php echo $category['mealcat_list']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                            </div>
                    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="mealphoto" class="text-custom">Upload Meal Photo</label>
                                    <div>
                                        <img src="mealUpload/<?php echo $meals['meal_photo'];?>" height="100px" alt="">
                                    </div>
                                    <input type='file' name='mealphoto'> 
                                </div>
                            </div>
                            <input type="hidden" name="mealid" value="<?php echo $meals['meal_id'];?>" >

                    
                        
                            <button type="submit" class="btn btn-custom">Save Changes</button>
                        </form>
                    </div>
                </div> 
                <!-- <div class="row">
                    <div class="col-12 mt-0">
                        <footer class="d-flex justify-content-center bg-dark pt-4">
                            <p class="text-white">Designed by Praise Adekunle &copy; Foodie 2019</p>
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