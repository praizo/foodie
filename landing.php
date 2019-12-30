<?php 
    // require 'Resident.php';

    // $r = new Resident;
    session_start();
    $transref = $_SESSION['transref'];

    // print_r($transref);

    $result = array();
    //The parameter after verify/ is the transaction reference to be verified
    $url = "https://api.paystack.co/transaction/verify/$transref";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt(
    $ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer sk_test_fc6eed3a2bde80c3d02917c186eae1c0517d0e39']
    );
    $request = curl_exec($ch);
    curl_close($ch);

    if ($request) {
        $result = json_decode($request, true);
        // echo "<pre>";

        // $tranxstatus = $result["data"]["status"];

        // print_r($result);
        //     echo "</pre>";

        if($result){
        if($result['data']){
            //something came in
            if($result['data']['status'] == 'success'){

                $conn = new Mysqli("localhost","root","","foodie");
                $sql = "UPDATE payment SET payment_status = 'success' WHERE payment_trxref = '$transref'";
                $res =  $conn->query($sql);
              
                if ($res) {
                    unset($_SESSION['meal_cart']);
                    header("location: user.php");

                }else{
                echo "no data inserted";
                }

            // the transaction was successful, you can deliver value
            /* 
            @ also remember that if this was a card transaction, you can store the 
            @ card authorization to enable you charge the customer subsequently. 
            @ The card authorization is in: 
            @ $result['data']['authorization']['authorization_code'];
            @ PS: Store the authorization with this email address used for this transaction. 
            @ The authorization will only work with this particular email.
            @ If the user changes his email on your system, it will be unusable
            */
            // echo "Transaction was successful";
            }else{
            // the transaction was not successful, do not deliver value'
            // print_r($result);  //uncomment this line to inspect the result, to check why it failed.
            echo "Transaction was not successful: Last gateway response was: ".$result['data']['gateway_response'];
            }
        }else{
            echo $result['message'];
        }

        }else{
            //print_r($result);
            die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
        }
    }else{
        //var_dump($request);
        die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
    }


?>