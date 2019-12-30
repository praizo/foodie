<?php  require ("meal.php");

    $obj = new Meal;

    $mealcat = trim(htmlentities($_POST['mealcat']));

    
    $obj->createCategory($mealcat);





?>