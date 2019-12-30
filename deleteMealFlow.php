<?php

require ("meal.php");

$obj = new Meal;

$obj->deleteMeal($_GET['id']);

?>