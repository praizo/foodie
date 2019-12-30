<?php


    require("admin.php");
    $obj1 = new Admin;

    $email = trim(htmlentities( $_POST['admin_Email']));
    $pwd = trim(htmlentities( $_POST['admin_Pwd']));

    $obj1->login($email,$pwd);


    



?>