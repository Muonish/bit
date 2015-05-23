<?php
	include('db_recipie.php');
	$dbcnx = loadBase();
	$uid = $_SESSION['uid'];
	if (isset($_POST['sub'])){
		$title = quote($_POST['title']);
		$table = $_POST['table'];
		$ingredient = $_POST['ingredient'];
		$number = $_POST['number'];
		$types = $_POST['types'];
		$steps = $_POST['steps'];
		for ($i=0; $i < count($ingredient); $i++) {
			quote($ingredient[$i]);
			quote($number[$i]);
			quote($types[$i]);
		}
		for ($i=0; $i < count($steps); $i++) {
			quote($steps[$i]);
		}

		if (!empty($title) && !empty($table) && !empty($ingredient) && count($ingredient) == count($number) &&
										count($ingredient) == count($types) && !empty($steps)){

			insertRecipe($dbcnx, $title, $table, $ingredient, $number, $types, $steps, $uid);
		} else {
			echo "Fill all the fields.";
		}
	}
	$delete_buttons = $_POST['delete'];
	$like_buttons = $_POST['like'];
	$title_names = $_POST['title_names'];

	if (!is_null($delete_buttons)){
		deleteRecipe($dbcnx, $title_names[key($delete_buttons)]);
	}
	if (!is_null($like_buttons)){
		likeRecipe($dbcnx, $uid, $title_names[key($like_buttons)]);
	}

	if(isset($_POST['editbtn'])){
		$title = quote($_POST['title']);
		$title_hid = quote($_POST['title_hid']);
		$ingredient = quote($_POST['ingredient']);
		$number = quote($_POST['number']);
		$types = quote($_POST['types']);
		$steps = quote($_POST['steps']);

		updateRecipe($dbcnx, $title, $title_hid, $table, $ingredient, $number, $types, $steps);

	}

	include("index.html");
	closeBase($dbcnx);
?>