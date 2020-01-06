<?php  


class Orders 
{
	protected $conn;			
	function __construct()
	{
		// session_start();				
		$this->conn = new Mysqli('localhost','root','','foodie');
	}

	function countOrders()
	{
		$sql = "SELECT * FROM customerorders";
		$result = $this->conn->query($sql);

		$items = [];
		if ($result->num_rows > 0) {
			while (  $row = $result->fetch_assoc()) {
					$items[] = $row;
					
			}
			return count($items);
			
		} 
	}

	function getOrder()
	{
		$sql = "SELECT CONCAT( customer.cust_fname,' ', customer.cust_lname)cust_fullname,customerorders.orders_date,customerorders.orders_status,customerorders.orders_sn,customerorders.orders_type,customerorders.orders_id ,CONCAT(staff.staff_fname,' ',staff.staff_lname)staff_fullname
			FROM customerorders
			LEFT JOIN customer ON customer.cust_id =customerorders.cust_id
			LEFT JOIN staff ON staff.staff_id = customerorders.staff_id ";
		

		$result = $this->conn->query($sql);
		$items = [];
		if ($result->num_rows > 0) {
			while (  $row = $result->fetch_assoc()) {
			$items[] = $row;	

			
		} 

		return $items;

		} 



	}

	function getOrderDetails($id)
	{
		$sql = "SELECT meal.meal_name, meal.meal_price,meal.meal_photo, orderdetails.orddetails_qty FROM orderdetails
				LEFT JOIN meal ON meal.meal_id = orderdetails.meal_id 
				WHERE orders_id ='$id' ";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			while (  $row = $result->fetch_assoc()) {
			$items[] = $row;	

			
			}

			return $items;
		}
	}

	function getcrudeOrder($id)
	{
		$sql = "SELECT CONCAT( customer.cust_fname,' ', customer.cust_lname)cust_fullname,customer.cust_email, customerorders.orders_date, customerorders.orders_amt,customerorders.orders_amt,customerorders.orders_status,customerorders.orders_sn,customerorders.orders_type,customerorders.orders_id,customerorders.staff_id ,CONCAT(staff.staff_fname,' ',staff.staff_lname)staff_fullname
			FROM customerorders
			LEFT JOIN customer ON customer.cust_id =customerorders.cust_id
			LEFT JOIN staff ON staff.staff_id = customerorders.staff_id 
			WHERE orders_id ='$id'";
		

		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		return $row;

		} 

	}

	function orderUpdate( $orderstatus, $staffname, $orderid)
	{
		$sql= "UPDATE customerorders SET
				orders_status = '$orderstatus',
				staff_id = '$staffname'
				WHERE orders_id = '$orderid'";
		$result = $this->conn->query($sql);

		header("location:adminOrderDetails.php?id=$orderid" );



	}

	function insertCustOrder($userid, $ordertotal, $mealid, $mealqty)
	{
		$sql= "INSERT INTO customerorders SET
		cust_id = '$userid',
		orders_amt = '$ordertotal'";

        $this->conn->query($sql);
		$id = $this->conn->insert_id;

		$_SESSION['orderid'] = $id;

		if ($id > 0) {
			$ordersn = "FOODIE/".date('Y'). '/' .str_pad($id, 3, '0' );
			$this->conn->query("UPDATE customerorders SET orders_sn ='$ordersn' WHERE orders_id = '$id'");		

			foreach ($mealid as $key => $value) {
				$mealid = $value;
				$mealquantity = $mealqty[$key];
				$ordersid = $id;

				$sql2 = "INSERT INTO orderdetails SET orders_id = '$ordersid', orddetails_qty = '$mealquantity', meal_id = $mealid";
				
				$result = $this->conn->query($sql2);
				print_r($result);
			}
		}
	}


	function insertPayment($trxref, $ordertotal, $orderid)
	{
		$sql= "INSERT INTO payment SET payment_amt = '$ordertotal', payment_trxref = '$trxref', orders_id = $orderid";

		$this->conn->query($sql);
		$id = $this->conn->insert_id;
	}

	function getCustOrder($userid)
	{
		$sql = "SELECT CONCAT( customer.cust_fname,' ', customer.cust_lname)cust_fullname,customerorders.orders_date,customerorders.orders_amt,customerorders.orders_status,customerorders.orders_sn,customerorders.orders_type,customerorders.orders_id
			FROM customerorders
			LEFT JOIN customer ON customer.cust_id =customerorders.cust_id
			WHERE customerorders.cust_id = '$userid'";	

		$result = $this->conn->query($sql);
		$items = [];
		if ($result->num_rows > 0) {
			while (  $row = $result->fetch_assoc()) {
				$items[] = $row;	
				
			} 
			return $items;
		} 

	}

}



