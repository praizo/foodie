<?php

    require("foodie.php");

    $obj = new User;

    // $email = $_POST['userEmail'];
    $email = trim(htmlentities( $_POST['userEmail']));
    $pwd = trim(htmlentities($_POST['userPwd']));
    // $pwd = $_POST['userPwd'];

    // print_r($_POST);
    
    $obj-> login(  $email, $pwd);
    


    



?>