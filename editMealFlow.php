<?php

    require ("meal.php");

    $obj = new Meal;



    $mealname = trim(htmlentities($_POST['mealname']));
    $mealdescription = trim(htmlentities($_POST['mealdescription']));
    $mealprice = trim(htmlentities($_POST['mealprice']));
    $mealcategory = trim(htmlentities($_POST['mealcategory']));
    $mealid = $_POST['mealid'];
    
    // print_r($_FILES);
    // print_r($_POST);




    // print_r($_POST);
    // print_r($_FILES);

    $obj-> editMeal($mealname, $mealdescription, $mealprice, $mealcategory, $mealid, $_FILES);

?>