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
                                <h2 class="text-custom">CHECKOUT</h2>
                            </div>
                    </div>
                </nav>

                <div class="row px-2 mx-auto ">
                    <div class="col-12">
                        <pre>
                        <?php print_r($_SESSION['meal_cart']); ?>
                        </pre>
                    	<table class="table border w-75">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                        	<?php 
                        if (isset($_SESSION['meal_cart'])) {$total=0;
                            foreach ($_SESSION['meal_cart'] as $mealUnit) {
                                    $b = $mealUnit["price"];
                                    $c = $mealUnit["quantity"];
                                    $sum = $b*$c;
                                ?>

                        <tr>

                            <td><img class='img-reponsive' height='100px' src='mealUpload/<?php echo $mealUnit['image']  ?>'></td>
                            <td><?php  echo $mealUnit['name']; ?></td>
                            <td><?php  echo $mealUnit['quantity']; ?></td>
                            <td><?php  echo $mealUnit['price']; ?></td>
                            <td><?php  echo $sum; ?></td>
                            <td>
                            



                        </tr>

                        <?php $total = $total + $sum;}	 ?>


                        <tr><th colspan='3'>Total</th><th><?php echo $total; ?></th></tr>
                        <tr>
                            <th >
                                <form action="checkoutFlow.php" method="post">
                                    <?php foreach ($_SESSION['meal_cart'] as $mealUnit) {?>
                                    <input type="hidden" name="mealid[]" value="<?php echo  $mealUnit['p_id'];?>">
                                    <input type="hidden" name="mealqty[]" value="<?php echo  $mealUnit['quantity'];?>">
                                    <?php } ?>
                                    <input type="hidden" name="userid[]" value="<?php echo $_SESSION['user']; ?>">
                                    <input type="hidden" name="ordertotal" value="<?php echo  $total;?>">
                                    <button class="btn btn-custom" type="submit">Proceed To Pay</button>
                                </form>
                            </th>
                        </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                        
                    
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


  

   
</body>

</html>