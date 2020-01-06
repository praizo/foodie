<?php
    if ($_POST) {
        require ("order.php");

        $obj = new Orders;
    
    
        $orderstatus =  trim(htmlentities($_POST['orderstatus']));
        $staffname =  trim(htmlentities($_POST['staffname']));
        $orderid = trim(htmlentities($_POST['orderid']));
        
        
        $obj-> orderUpdate( $orderstatus, $staffname, $orderid);
    }
    

?>