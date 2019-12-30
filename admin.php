<?php 
	require("utilityAdmin.php");
	/**
	 * Admin function
	 */
	class Admin extends utilityAdmin
	{

	
	// function signup($admin_Fname,$admin_Lname,$admin_Phone,$admin_Email,$admin_Pwd)
	// {
    //     // $encrypt = md5($pwd);
	// 	$sql= "INSERT INTO staff SET
	// 	staff_fname = '$admin_Fname',
	// 	staff_lname = '$admin_Lname',
    //     staff_password = '$admin_Pwd',
    //     staff_email = '$admin_Email',
	// 	staff_phone = '$admin_Phone'";

		
    //     $this->conn->query($sql);


	// 	$id = $this->conn->insert_id;

    //     $_SESSION['staff'] = $id;
    //     header("location:adminPage.php");

        
        

	// }

    function getAdminDetails($staffid)
    {
        $sql = "SELECT * FROM staff WHERE staff_id = '$staffid' AND staff_type = 'admin'" ;
        $result = $this->conn->query($sql);

        $row = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
                    return $row;

        }
            
            
    }

	function login($admin_Email,$admin_Pwd)
	{
		// $encrypted = md5($pwd);

        $sql= "SELECT * FROM staff WHERE staff_password = '$admin_Pwd' AND staff_email = '$admin_Email' LIMIT 1";

        $result = $this->conn->query($sql);
        $deets=[];

        if ($result->num_rows == 1) { //==1 valid details
            $deets = $result->fetch_assoc();
            $_SESSION['staff'] = $deets['staff_id'];

            // print_r($deets);

            header("location: adminPage.php");
        

        } else {
            header("location: adminLoginPage.php");
        }
	}


    function editProfile($admin_Fname,$admin_Lname,$admin_Phone,$admin_Email,$admin_Pwd, $staffid,$file_array)
    {
        // $custid = $_SESSION['user'];
        $tmp_location = $file_array['profilePics']['tmp_name'];
        $original = $file_array['profilePics']['name'];
        $dst = "upload/$original";
        move_uploaded_file($tmp_location, $dst);


        $sql = "UPDATE staff SET
            staff_fname = '$admin_Fname',
            staff_lname = '$admin_Lname',
            staff_password = '$admin_Pwd',
            staff_email = '$admin_Email',
            staff_phone = '$admin_Phone',
            staff_photo = '$original'
            WHERE staff_id = '$staffid'"; 


        $result = $this->conn->query($sql);

        header("location: adminLoginPage.php");

    }

    function getStaffDetails()
    {
        $sql = "SELECT * FROM staff" ;
        $result = $this->conn->query($sql);

        $items = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $items[] = $row;
            }

        }

        return $items; 
    }


}


?>


