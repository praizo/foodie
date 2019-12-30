<?php

	require("foodie.php");


    $p = new User;

	$custid = $_POST['reg_id'];
	$oldpwd = trim(htmlentities($_POST['oldPass']));
    $newpwd = trim(htmlentities($_POST['newPass']));

    // print_r($_POST['oldPass']);

    $p-> changePassword($custid,$oldpwd,$newpwd);


?>