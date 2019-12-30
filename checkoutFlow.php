<?php  
    require("order.php");

    $obj = new Orders;
    
    session_start();	
    $userid = $_POST['userid'];
    $ordertotal = $_POST['ordertotal'];
    $mealid = $_POST['mealid'];
    $mealqty = $_POST['mealqty'];

    $obj->insertCustOrder( $userid, $ordertotal, $mealid, $mealqty);


    $_SESSION['transref'] = mt_rand();
    $trxref = $_SESSION['transref'];
    $obj->insertPayment($trxref, $ordertotal, $_SESSION['orderid']);  



   

    header("location: paystack.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";




?>