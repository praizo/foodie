<?php 
require 'adminHeader.php';

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
                        
                            <h2 class="text-custom">DELETE MEAL</h2>
                        </div>
                    </div>
                </nav>
                <?php  if(isset(($_GET['status']))){
                                        
                    echo'<div class="alert alert-info alert-dismissible fade show col-md-12">';
                    echo'Meal deleted successfully';
                    echo ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>';
                    echo'</div>';
                    } ?>
                <div class="row px-2 mx-auto ">
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
                                                <div class="card shadow border">
                                                    <img src="mealUpload/<?php echo $mealList['meal_photo'];?>" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-custom font-weight-bold"><?php   echo $mealList['meal_name']; ?></h5>                                                  
                                                        <p class="card-text"><?php echo $mealList['meal_description'];?></p>
                                                        <p class="card-text"><?php echo $mealList['meal_price'];?></p>
                                                        <a href="<?php echo 'deleteMealFlow.php?id='.$mealList['meal_id'];?>" onclick="return confirm('Are you sure?')" class="btn btn-custom">Delete Meal</a>
                                                        <!-- Button trigger modal -->
                                                        <!-- <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModal">Delete Meal</button> -->
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

        <div class="overlay"></div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-custom h3" id="exampleModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body h5">
                Please confirm delete?
            </div>
            <div class="modal-footer">
            <form>
                <input type="hidden" name="">
                <button type="button" class="btn btn-custom" data-dismiss="modal">No</button>
                <!-- <button type="button" class="btn btn-custom">Yes</button> -->
                <a href="<?php echo 'deleteMealFlow.php?id='.$mealList['meal_id'];?>" class="btn btn-custom">Delete Meal</a>

            </form>
            </div>
            </div>
        </div>
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