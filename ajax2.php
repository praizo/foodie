<?php 
    session_start();
    if (isset($_SESSION['meal_cart'])) {
        echo count($_SESSION['meal_cart']);    
    } else {
        echo "0";
    }


?>