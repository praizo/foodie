<?php


require("adminHeader.php");

// $orderInfos = $a->getOrder();
if (!isset($_GET['id'])) {
	header("location: adminOrder.php");
}

$orderDetails = $a->getOrderDetails($_GET['id']);

$ordercrudeInfos = $a->getcrudeOrder($_GET['id']);

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
						<div class="media border shadow p-5">
							<div class="media-body">
								<h3 class="mt-0 text-custom">Order Details</h3>
								<hr>
								<form action="adminOrderUpdate.php" method="post">
									<div class="row">
										<p class="col-6">Customer Name: <?php echo $ordercrudeInfos['cust_fullname']; ?></p>
										<p class="col-6">Ordered on: <?php echo $ordercrudeInfos['orders_date']; ?></p>
									</div>
									
									<div class="form-group row">
										<label class="col-md-2  col-form-label"for="staffname">Attended to by:</label>
										<div class="col-md-2">
											<select name="staffname" id="staffname" class="form-control ">
												<option value="<?php echo $ordercrudeInfos['staff_id']?>" 	selected><?php echo  $ordercrudeInfos['staff_fullname'] ?></option>
												<?php foreach ($staffLists as $list) {?>
													<option value="<?php echo $list['staff_id'];?>"> <?php echo $list['staff_fname'] . ' '. $list['staff_lname'] ?></option>
												<?php  } ?>

											</select>
										</div>
										<label class="col-md-2  col-form-label"for="orderstatus">Order Status:</label>
										<div class="col-md-2">
											<select name="orderstatus" id="orderstatus" class="form-control ">
												<option value="<?php echo $ordercrudeInfos['orders_status'];?>" selected><?php echo $ordercrudeInfos['orders_status']; ?></option>
												<option value="Pending">Pending</option>
												<option value="Ready">Ready</option>
											</select>
										</div>
										<input type="hidden" name="orderid" value="<?php echo $_GET['id'];?>">
										<button type="submit" class="btn btn-custom">Save</button>
									</div>
								</form>

								<table class="table table-striped border ">
									<thead class="thead-dark">
										<tr>
											<th scope="col" >Meal</th>
											<th scope="col">Price</th>
											<th scope="col">Quantity</th>
											<th scope="col">Sub Total</th>
										</tr>
									</thead>
									<tbody>
									<?php  foreach ($orderDetails as $key => $detail) {
										$b =  $detail['meal_price'];
										$c = $detail['orddetails_qty']; 
										$d = $b*$c;
										?>
										<tr>
											<td ><?php echo $detail['meal_name']; ?></td>
											<td >&#8358; <?php echo number_format($detail['meal_price'],2);?></td>
											<td ><?php echo $detail['orddetails_qty']; ?></td>
											<td>&#8358; <?php  echo number_format($d,2);?></td>
										</tr>
									<?php } ?>
										<tr>
											<th colspan="3">Total</th>
											<th>&#8358; <?php echo number_format($ordercrudeInfos['orders_amt']);?></th>
										</tr>
										
									</tbody>
								</table>   

							</div>
						</div>						            
                    </div>
				</div>
				
				<div class="row mt-2">
					<div class="col-12 mt-0">
						<footer class="d-flex justify-content-center bg-dark pt-4">
							<p class="text-white">Designed by Praise Adekunle &copy; Foodie 2019</p>
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
</body>

</html>