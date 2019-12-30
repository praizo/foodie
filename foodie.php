<?php

require("utility.php");


class User extends utility
{

	
	function signup($firstname, $lastname,$pwd,$email,$phone)
	{
        // $encrypt = md5($pwd);
		$sql= "INSERT INTO customer SET
		cust_fname = '$firstname',
		cust_lname= '$lastname',
        cust_password = '$pwd',
        cust_email = '$email',
		cust_phone = '$phone'";

		
        $this->conn->query($sql);


		$id = $this->conn->insert_id;

        $_SESSION['user'] = $id;
        header("location:user.php");

        
        

	}

    function getDetails($userid)
    {
        $sql = "SELECT * FROM customer WHERE cust_id = '$userid'";
        $result = $this->conn->query($sql);

        $row = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } 
            
            
        return $row;
    }

	function login($email,$pwd)
	{
		// $encrypted = md5($pwd);

        $sql= "SELECT * FROM customer WHERE cust_password = '$pwd' AND cust_email = '$email' LIMIT 1";

        $result = $this->conn->query($sql);
        $deets=[];

        if ($result->num_rows == 1) { //==1 valid details
            $deets = $result->fetch_assoc();
            $_SESSION['user'] = $deets['cust_id'];

            // print_r($deets);

            header("location: user.php");
            
        } else {
            header("location: menu.php?status='failed'");
        }
	}


    function editProfile($firstname,$lastname,$email,$phone, $custid,$file_array)
    {
        $tmp_location = $file_array['profilePics']['tmp_name'];
        $original = $file_array['profilePics']['name'];
        $dst = "upload/$original";
        move_uploaded_file($tmp_location, $dst);


        if($original != ""){
            $sql = "UPDATE customer SET
                    cust_fname = '$firstname',
                    cust_lname= '$lastname',
                    cust_email = '$email',
                    cust_phone = '$phone',
                    cust_photo = '$original'
                    WHERE cust_id = '$custid'"; 
        
        
                $result = $this->conn->query($sql);
                if ($result == true) {
                    header("location:userProfile.php?id=$custid&status=success" );
                } else {
                    header("location:userProfile.php?id=$custid&status=fail'" );
                }
        } else {
            $sql = "UPDATE customer SET
                    cust_fname = '$firstname',
                    cust_lname= '$lastname',
                    cust_email = '$email',
                    cust_phone = '$phone'
                    WHERE cust_id = '$custid'"; 
        
        
            $result = $this->conn->query($sql);
            if ($result == true) {
                header("location:userProfile.php?status=success" );
            } else {
                header("location:userProfile.php?status=fail" );
            }
        }
        

    }

    function changePassword($custid,$oldpwd,$newpwd)
    {
        if ($oldpwd != "" and $newpwd != "") {
            $sql = "UPDATE customer SET cust_password = '$newpwd' WHERE cust_id = '$custid' AND cust_password = '$oldpwd'"; 
            $result = $this->conn->query($sql);

            if ($result->affected_rows > 0) {
                header("location:userProfile.php?pstatus=success" );
            } else {
                header("location:userProfile.php?pstatus=fail");
            }
        } else {
                header("location:userProfile.php?pstatus=fail");
            }            
    }   

}


?>