<?php 
	require ("adminUtility.php");


	/**
	 * Product
	 */
	class Meal extends adminUtility
	{	
		function createCategory($mealcat)
		{
			$sql = "INSERT INTO mealcategory SET mealcat_list ='$mealcat'";

			$this->conn->query($sql);
			$id = $this->conn->insert_id;

			
			// $_SESSION['mealcat1'] = $id;
			if ($id >0) {
				header("location:createMeal.php?m=success&name=$mealcat");
			} else {
				header("location:createMeal.php?m=fail");
			}
			


		
		}

		function getCategory()
		{
			$sql = "SELECT * FROM mealcategory";
			$result = $this->conn->query($sql);
			$items = [];
			if ($result->num_rows > 0) {
				while (  $row = $result->fetch_assoc()) {
						$items[] = $row;
						
				}
				// print_r($items);
				
			} 
			
				
			return $items;
		}


		function createMeal($mealname, $mealdescription, $mealprice, $mealcategory, $file_array)
		{
			$tmp_location = $file_array['mealphoto']['tmp_name'];
			$original = $file_array['mealphoto']['name'];
			$dst = "mealUpload/$original";
			move_uploaded_file($tmp_location, $dst);
			
			$sql = "INSERT INTO meal SET
			meal_name = '$mealname',
			meal_description = '$mealdescription',
			meal_price = '$mealprice',
			mealcat_id = '$mealcategory',
			meal_photo = '$original'";

			$this->conn->query($sql);
			$id = $this->conn->insert_id;


			if ($id >0) {
				header("location:createMeal.php?p=success&meal=$mealname");
			} else {
				header("location:createMeal.php?p=fail");
			}

		}


		function displayMeal($mealcat_id)
		{
			$sql = "SELECT * FROM meal WHERE mealcat_id ='$mealcat_id' AND meal_status = '1'";
			$result = $this->conn->query($sql);
			$items=[];
			if ($result->num_rows > 0) {
				while (  $row = $result->fetch_assoc()) {
						$items[] = $row;
						
				}
			} 
			return $items;
			
		}


		function displayMealHome()
		{
			$sql = "SELECT * FROM meal WHERE mealcat_id IN (1,2) order by RAND() LIMIT 6";
			$result = $this->conn->query($sql);

			$items=[];
			if ($result->num_rows > 0) {
				while (  $row = $result->fetch_assoc()) {
						$items[] = $row;
						
				}
			} 
			return $items;


		}


		function getMealDetails($id)
		{
			$sql = "SELECT * FROM meal WHERE meal_id = '$id' AND meal_status = '1'";
			$result = $this->conn->query($sql);
			$mealItems = [];
			if ($result->num_rows > 0) {
				$mealItems = $result->fetch_assoc();
				
			} 
			
				
			return $mealItems;
		}
		

		function editMealCat($mealcatid)
		{
			$sql = "SELECT mealcat_list FROM mealcategory WHERE mealcat_id = '$mealcatid'";

			$result = $this->conn->query($sql);

			$row = [];
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
			} 
				
				
			return $row;
			
		}
		

		function editMeal($mealname, $mealdescription, $mealprice, $mealcategory, $mealid, $file_array)
		{
			$tmp_location = $file_array['mealphoto']['tmp_name'];
			$original = $file_array['mealphoto']['name'];
			$dst = "mealUpload/$original";
			move_uploaded_file($tmp_location, $dst);
				
			if($original !=""){
				
				$sql = "UPDATE meal SET
					meal_name = '$mealname',			
					meal_description = '$mealdescription',
					meal_price = '$mealprice',
					mealcat_id = '$mealcategory',
					meal_photo = '$original'
					WHERE meal_id = '$mealid'"; 


				$result = $this->conn->query($sql);

				if ($result == true) {
					header("location:editMeal.php?id=$mealid&status='success'" );
				} else {
					header("location:editMeal.php?id=$mealid");
				}
			} else {
				$sql = "UPDATE meal SET
					meal_name = '$mealname',			
					meal_description = '$mealdescription',
					meal_price = '$mealprice',
					mealcat_id = '$mealcategory'
					WHERE meal_id = '$mealid'"; 


					$result = $this->conn->query($sql);

					if ($result == true) {
						header("location:editMeal.php?id=$mealid&status='success'" );
					} else {
						header("location:editMeal.php");
					}
			}
			
		}

		function deleteMeal($mealid)
		{
			echo $mealid;
			
			$sql = "UPDATE meal SET meal_status = '0' WHERE meal_id= '$mealid' ";

			$result = $this->conn->query($sql);

			if ($result == true) {
				header("location:deleteMeal.php?status='success'");
				// echo "true";
			} else {
				header("location:deleteMeal.php?status='fail'");
			}
		}
		
		
		
	}	




?>