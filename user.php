<?php


require("header.php");

?>

    <div class="container-fluid">
    
        <div class="wrapper">
            <!-- Sidebar  -->
           <?php 

            require("sidebar.php");
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
                                                    <div class="card  border">
                                                        <img src="mealUpload/<?php echo $mealList['meal_photo'];?>" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-custom font-weight-bold"><?php   echo $mealList['meal_name']; ?></h5>
                                                                                        
                                                            <p class="card-text"><?php echo $mealList['meal_description'];?></p> <div >
                                                                    Quantity:  <input type="number" class="form-control-inline quantity<?php echo $mealList['meal_id']; ?>" min="1"  style="max-width:50px;" value="1" >    
                                                            </div>
                                                            <p class="card-text">&#8358; <?php echo number_format($mealList['meal_price'],2);?></p>
                                                            <button type="button" class="btn btn-custom"  onclick="add_cart('<?php echo $mealList['meal_id']; ?>')">Order Now</button>
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
                <div class="row">
                    <div class="col-12 mt-0">
                        <footer class="d-flex justify-content-center bg-dark pt-4">
                            <p class="text-custom">Designed by Praise Adekunle &copy; Foodie 2019</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <div class="overlay"></div>


    </div>



    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="script.js"></script>

      
    <!-- <script src="js/jquery.js"></script> -->


    <script>
    function add_cart(p_id=""){
        var quantity = $(".quantity"+p_id).val();
        $.ajax({
            type:"post",
            url:"ajax.php",
            data:{action:'add',p_id:p_id,quantity:quantity},
            success:function(result){
                $('.cart_data').html(result);
                cartCount();
            }
        });
    }


    add_cart();

    function cartCount() {
        $.ajax({
            type: "post",
            url:"ajax2.php",
            success:function (result) {
                $('#countNo').html(result);
            }
        })
    }
    
    function remove_cart(p_id){
        //alert(p_id);
        $.ajax({
            type:"post",
            url:"ajax.php",
            data:{action:'delete',p_id:p_id},
            success:function(result){
                $('.cart_data').html(result);
            }
        });
    }
    function empty_cart(){
        $.ajax({
            type:"post",
            url:"ajax.php",
            data:{action:'empty'},
            success:function(result){
                $('.cart_data').html(result);
            }
        });
    }



        
    </script>

  

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-shopping-basket"></i>Foodie Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body cart_data">
                    
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</body>

</html>