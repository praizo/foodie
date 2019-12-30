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
                                <h2 class="text-custom">ORDERS</h2>
                            </div>
                    </div>
                </nav>

                <div class="row px-1 mx-0">                
                    <div class="col-12">
                    <?php 
                        if(is_array($orderDatas)){
                        foreach ($orderDatas as $orderData) {?>
                            <div class="card my-2">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $orderData['orders_sn']; ?></h5>
                                    <hr>

                                    <div class="row">
                                        <h6 class="card-text col-12">Customer Name: <?php echo $orderData['cust_fullname']; ?></h6>
                                        <h6 class="card-text col-6">Ordered on: <?php echo $orderData['orders_date']; ?></h6>
                                        <h6 class="card-text col-6">Ordered status: <?php echo $orderData['orders_status']; ?></h6>
                                        <h6 class="card-text col-6">Ordered type: <?php echo $orderData['orders_type']; ?></h6>
                                        <h6 class="card-text col-6">Ordered Amount: &#8358; <?php echo number_format($orderData['orders_amt'],2); ?></h6>

                                        <a href="userOrderDetails.php?id=<?php echo $orderData['orders_id'];?>" class="btn btn-custom ml-3">View Order Details</a>
                                    </div>
                                </div>
                            </div>
                    <?php }	}else{
                            echo"<div class='alert alert-primary' role='alert'>No item ordered yet</div>";
                        }?>
                
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



    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="script.js"></script>

    <script>
    function add_cart(p_id=""){
        var quantity = $(".quantity"+p_id).val();
        $.ajax({
            type:"post",
            url:"ajax.php",
            data:{action:'add',p_id:p_id,quantity:quantity},
            success:function(result){
                $('.cart_data').html(result);
            }
        });
    }


    add_cart();
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



        //function addTocart(thebtn,mealid){
                // alert(mealid);
                //$.ajax({
                  //type: "POST",
                  //url: "addtoCart.php",
                  //data: "mealid="+mealid,
                  //success: function(msg){
                    // alert(msg);
                   // $("#content2").html(msg);
                    // $(thebtn).html("Added");
                    // $(thebtn).attr('disabled','disabled');
                 // }
               // });

       // }
        
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