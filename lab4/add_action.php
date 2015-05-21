<?php
	include('db_recipie.php');
	
	if (isset($_POST['sub'])){
		$dbcnx = loadBase();
		echo 'lol';
		echo $title."<br>".$ingredient."<br>".$number."<br>".$types."<br>".$steps;
		insertRecipe($dbcnx, $title, $ingredient, $number, $types, $steps);
		
	}	
?>