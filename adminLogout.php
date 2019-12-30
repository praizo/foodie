<?php 

session_start();

if(isset($_SESSION['staff'])) {
	session_unset($_SESSION['staff']);
	session_destroy();

	header("location:adminLoginPage.php");

}

?>