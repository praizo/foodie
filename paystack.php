<?php  
    require 'order.php';
    $r = new Orders;

    
    session_start();
    $ordersid = $_SESSION['orderid'];
    
    $deets = $r->getcrudeOrder( $ordersid);

    $amt = $deets['orders_amt'] * 100;

    $ref = $_SESSION['transref'];

    $result = array();
    //Set other parameters as keys in the $postdata array
    $postdata =  array( 'email' => $deets['cust_email'], 'amount' =>  $amt  ,"reference" => $ref);
    $url = "https://api.paystack.co/transaction/initialize";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $headers = [
        'Authorization: Bearer sk_test_fc6eed3a2bde80c3d02917c186eae1c0517d0e39 ',
        'Content-Type: application/json',

    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $request = curl_exec ($ch);


    if ($request) {
        curl_close ($ch);
        $result = json_decode($request, true);
    } else {
        echo curl_error($ch);
    }

    echo "<pre>";
    print_r($result);
    echo "<pre>";

    if ($result['status']) {
        $authurl = $result['data']['authorization_url'];
        header("location: $authurl");
    }	else {
        echo $result['message'];
    }


    //Use the $result array to get redirect URL']['authorization_url']);

?>