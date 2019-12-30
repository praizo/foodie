<?php


require("adminHeader.php");



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
                                <h2 class="text-custom">ORDERS</h2>
                            </div>
                    </div>
                </nav>

                <div class="row px-2 mx-auto ">
                    <div class="col-12"> 
                    
                        <?php 
                            if(is_array($orderInfos)){
                            foreach ($orderInfos as $orderInfo) {?>
                                <div class="card my-2">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $orderInfo['orders_sn']; ?></h5>
                                        <hr>

                                        <div class="row">
                                            <p class="card-text col-12">Customer Name: <?php echo $orderInfo['cust_fullname']; ?></p>
                                            <p class="card-text col-6">Attended to by: <?php echo $orderInfo['staff_fullname']; ?></p>
                                            <p class="card-text col-6">Ordered on: <?php echo $orderInfo['orders_date']; ?></p>
                                            <p class="card-text col-6">Ordered status: <?php echo $orderInfo['orders_status']; ?></p>
                                            <p class="card-text col-6">Ordered type: <?php echo $orderInfo['orders_type']; ?></p>

                                            <a href="adminOrderDetails.php?id=<?php echo $orderInfo['orders_id'];?>" class="btn btn-custom ml-3">View Order Details</a>
                                        </div>
                                    </div>
                                </div>
                        <?php }	} else{
                            echo"<div class='alert alert-primary' role='alert'>No item ordered yet</div>";
                        }?>
                        

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