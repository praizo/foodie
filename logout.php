<?php

session_start();


if (isset($_SESSION['user'])) {
	session_unset($_SESSION['user']);
	session_destroy();

	

}
header("location: menu.php");


?>