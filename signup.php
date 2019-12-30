<?php

    require("foodie.php");

    $obj = new User;


    $firstname = trim(htmlentities($_POST['fname']));
    $lastname = trim(htmlentities($_POST['lname']));
    $phone = trim(htmlentities($_POST['phoneNo']));
    $pwd = trim(htmlentities($_POST['pwd1']));
    $email = trim(htmlentities($_POST['email']));


    
    $obj-> signup($firstname,$lastname,$pwd,$email,$phone);


?>