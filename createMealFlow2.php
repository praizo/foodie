<?php  require ("meal.php");

    $obj = new Meal;

    // $mealcat = trim(htmlentities($_POST['mealcat']));

    
    // $obj->createCategory($mealcat);




	$mealname = trim(htmlentities($_POST['mealname']));
    $mealdescription = trim(htmlentities($_POST['mealdescription']));
    $mealprice = trim(htmlentities($_POST['mealprice']));
    $mealcategory = trim(htmlentities($_POST['mealcategory']));



	// $custid = $_POST['reg_id'];

	// print_r($_POST);
	// print_r($_FILES);

    $obj-> createMeal($mealname, $mealdescription, $mealprice, $mealcategory, $_FILES);



?>