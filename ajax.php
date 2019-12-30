<?php
	$conn =new  Mysqli('localhost','root','','foodie');
	session_start();
	$action = $_REQUEST['action'];
	@$p_id = trim($_REQUEST['p_id']);


	if ($action == 'add') {
		@$quantity = $_REQUEST['quantity'];

		if (!empty($p_id)) {
			$query = "select * from meal where meal_id = '" . $p_id . "'";
			$rs = $conn->query($query);
			$meal_data = $rs->fetch_assoc();

			$mealItem = array("p_id" => $meal_data['meal_id'], "name" => $meal_data['meal_name'], "price" => $meal_data['meal_price'] * $quantity, "image" => $meal_data['meal_photo'], "quantity" => $quantity);

			if (isset($_SESSION['meal_cart']) && !empty($_SESSION['meal_cart'])) {
				if (!array_key_exists($meal_data['meal_id'], $_SESSION['meal_cart'])) {

					$_SESSION['meal_cart'][$meal_data['meal_id']] = $mealItem;
				} else {

					// $_SESSION['meal_cart'][$meal_data['meal_id']]['price'] = $_SESSION['meal_cart'][$meal_data['meal_id']]['price'] + ($meal_data['meal_price'] * $quantity);
					$_SESSION['meal_cart'][$meal_data['meal_id']]['quantity'] = $_SESSION['meal_cart'][$meal_data['meal_id']]['quantity'] + $quantity;
				}


			} else {
				$_SESSION['meal_cart'][$meal_data['meal_id']] = $mealItem;
			}

		}
	}

	if ($action == "delete") {
		unset($_SESSION['meal_cart'][$p_id]);
	}

	if ($action == "empty") {
		unset($_SESSION['meal_cart']);
	}
	?>
	<?php if(!empty($_SESSION['meal_cart'])){?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" colspan="2">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col"><button type="button" class="btn btn-custom" onclick="empty_cart();"><i class="fas fa-trash-alt"></i> Empty Cart</button></td></th>
                            </tr>
                        </thead>
                        <tbody class="">
	<?php
		if (isset($_SESSION['meal_cart'])) {$total=0;
			foreach ($_SESSION['meal_cart'] as $mealUnit) {
					$b = $mealUnit["price"];
					$c = $mealUnit["quantity"];
					$d = $b*$c;
				?>

				<tr>
					<td><img class='img-reponsive' height='100px' src='mealUpload/<?php echo $mealUnit['image']  ?>'></td>
					<td><?php  echo $mealUnit['name']; ?></td>
					<td><?php  echo $mealUnit['quantity']; ?></td>
					<td> &#8358;<?php  echo number_format($mealUnit['price'],2);?></td>
					<td>&#8358;<?php  echo number_format($d,2); ?></td>
					<td>					
						<button class="btn btn-custom pull-right" onclick="remove_cart('<?php echo $mealUnit['p_id']; ?>')" ><i class="fas fa-trash-alt"></i></button>
					</td>



				</tr>

				<?php $total = $total + $d;
			}	?>


				<tr><th colspan='4'>Total</th><th>&#8358; <?php echo number_format($total,2); ?></th></tr>
				<tr>
					<th >
						<form action="checkoutFlow.php" method="post">
							<?php foreach ($_SESSION['meal_cart'] as $mealUnit) {?>
							<input type="hidden" name="mealid[]" value="<?php echo  $mealUnit['p_id'];?>">
							<input type="hidden" name="mealqty[]" value="<?php echo $mealUnit['quantity'];?>">
							<?php } ?>
							<input type="hidden" name="userid" value="<?php echo $_SESSION['user']; ?>">
							<input type="hidden" name="ordertotal" value="<?php echo  $total;?>">
							<button class="btn btn-custom" type="submit">Proceed To Pay</button>
						</form>
					</th>
				</tr>

	<?php } ?>


	</tbody>
                    </table>


							<?php } else{?>

								<h3>No order has been placed yet</h3>
							<?php }?>