<?php
	include('db_recipie.php');
	$dbcnx = loadBase();
	if (isset($_POST['sub'])){
		$title = $_POST['title'];
		$table = $_POST['table'];
		$ingredient = $_POST['ingredient'];
		$number = $_POST['number'];
		$types = $_POST['types'];
		$steps = $_POST['steps'];

		if (!empty($title) && !empty($table) && !empty($ingredient) && count($ingredient) == count($number) &&
										count($ingredient) == count($types) && !empty($steps)){

			insertRecipe($dbcnx, $title, $table, $ingredient, $number, $types, $steps, $user);
		} else {
			echo "Fill all the fields.";
		}
	}
	$delete_buttons = $_POST['delete'];
	$title_names = $_POST['title_names'];

	if (!is_null($delete_buttons)){
		deleteRecipe($dbcnx, $title_names[key($delete_buttons)]);
	}

	if(isset($_POST['editbtn'])){
		$title = $_POST['title'];
		$title_hid = $_POST['title_hid'];
		$ingredient = $_POST['ingredient'];
		$number = $_POST['number'];
		$types = $_POST['types'];
		$steps = $_POST['steps'];

		updateRecipe($dbcnx, $title, $title_hid, $table, $ingredient, $number, $types, $steps);

	}
	include("index.html");
?>