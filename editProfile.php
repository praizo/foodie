<?php 
    require("foodie.php");


    $obj = new User;
    
    $firstname = trim(htmlentities($_POST['fname']));
    $lastname = trim(htmlentities($_POST['lname']));
    $phone = trim(htmlentities($_POST['phoneNo']));
    $email = trim(htmlentities($_POST['email']));
	$custid = $_POST['reg_id'];

	// print_r($_POST);
	// print_r($_FILES);

    $obj-> editProfile($firstname,$lastname,$email,$phone, $custid, $_FILES);

        
// $filename = $_FILES['mypix']['tmp_name'];
// move_uploaded_file($filename, 'uploaded/test.jpg');

    

?>