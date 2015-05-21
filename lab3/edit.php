

<?php
	include('db_recipie.php');
	$dbcnx = loadBase();

	if (isset($_GET['title'])) {
		$value = $_GET['title'];
	} else {
		die("Bad input.");
	}


	$ingredients = getIngredients($dbcnx, $value);
	$numbers = getNumbers($dbcnx, $value);
	$types = getTypes($dbcnx, $value);
	$steps = getSteps($dbcnx, $value);
	include('edit.html');
?>
				

				