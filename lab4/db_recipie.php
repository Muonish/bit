<?php
	session_start();

	function loadBase(){
		$dblocation = "localhost";
		$dbuser = "root";
		$dbpasswd = "123321";
		$dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
		if (!$dbcnx){
		    return "Failed.";
		}
		mysql_query("SET NAMES utf8");
		return $dbcnx;
	}
	
	function closeBase($dbcnx){
		$result = "Failed.";
		if(mysql_close($dbcnx)){
		  $result = "Success.";
		}
		return $result;
	}

	function quote($var) {
	    return mysql_real_escape_string($var);
	}
	
	function getAllTypes($dbcnx){
		$query = mysql_db_query("recipe_base", "SELECT `type`.`name` FROM `type`" , $dbcnx);
		return queryResultToArray($query, 'name');
	}

	function getAllTables($dbcnx){
		$query = mysql_db_query("recipe_base", "SELECT `table`.`name` FROM `table`" , $dbcnx);
		return queryResultToArray($query, 'name');
	}

	function getTitles($dbcnx){
		$query = mysql_db_query("recipe_base", "SELECT `recipe`.`name` FROM `recipe`" , $dbcnx);
		return queryResultToArray($query, 'name');
	}

	function getUserTitles($dbcnx, $uid){
		$query = mysql_db_query("recipe_base", "SELECT `recipe`.`name` FROM `recipe` WHERE `recipe`.`user_id` = ".$uid."" , $dbcnx);
		return queryResultToArray($query, 'name');
	}

	function getUserFavorites($dbcnx, $uid){
		$query = mysql_db_query("recipe_base", "SELECT `recipe`.`name` FROM `recipe`, `favorite` WHERE `favorite`.`user_id` = ".$uid." AND".
								"`favorite`.`recipe_id` = `recipe`.`recipe_id` " , $dbcnx);
		return queryResultToArray($query, 'name');
	}

	function getLikesNumber($dbcnx, $recipe){
		$query = mysql_db_query("recipe_base", "SELECT `favorite`.`recipe_id` FROM `recipe`, `favorite` ".
								"WHERE `favorite`.`recipe_id` = `recipe`.`recipe_id` AND".
								"`recipe`.`name` = '" . $recipe . "' " , $dbcnx);
		return count(queryResultToArray($query, 'recipe_id'));
	}

	function isLiked($dbcnx, $recipe, $uid){
		$query = mysql_db_query("recipe_base", "SELECT `favorite`.`recipe_id` FROM `recipe`, `favorite` ".
								"WHERE `favorite`.`recipe_id` = `recipe`.`recipe_id` AND".
								"`recipe`.`name` = '" . $recipe . "' AND `favorite`.`user_id` = ".$uid." " , $dbcnx);
		if (count(queryResultToArray($query, 'recipe_id')) > 0){
			return true;
		} else {
			return false;
		}
	}

	function getTitlesForTable($dbcnx, $table){
		$query = mysql_db_query("recipe_base", "SELECT `recipe`.`name` FROM `recipe`, `table_map`, `table`".
								" WHERE `recipe`.`recipe_id` = `table_map`.`recipe_id` AND `table_map`.`table_id` = `table`.`table_id`".
								" AND `table`.`name` = '".$table."'" , $dbcnx);
		return queryResultToArray($query, 'name');
	}

	function getIngredients($dbcnx, $recipe){
		$query = mysql_db_query("recipe_base", "SELECT `ingredient`.`name` FROM `ingredient`, `ingredient_map`, `recipe` WHERE". 
							  "`ingredient_map`.`recipe_id` = `recipe`.`recipe_id` AND `recipe`.`name` = '" . $recipe . "'".
							  " AND `ingredient_map`.`ingredient_id` = `ingredient`.`ingredient_id`" , $dbcnx);
		return queryResultToArray($query, 'name');
	}

	function getNumbers($dbcnx, $recipe){
		$query = mysql_db_query("recipe_base", "SELECT `ingredient_map`.`number` FROM `ingredient_map`, `recipe` WHERE". 
							  "`ingredient_map`.`recipe_id` = `recipe`.`recipe_id` AND `recipe`.`name` = '" . $recipe . "'", $dbcnx);
		return queryResultToArray($query, 'number');
	}

	function getTypes($dbcnx, $recipe){
		$query = mysql_db_query("recipe_base", "SELECT `type`.`name` FROM `type`, `ingredient_map`, `recipe` WHERE". 
							  "`ingredient_map`.`recipe_id` = `recipe`.`recipe_id` AND `recipe`.`name` = '" . $recipe . "'".
							  " AND `ingredient_map`.`type_id` = `type`.`type_id`" , $dbcnx);
		return queryResultToArray($query, 'name');
	}

	function getSteps($dbcnx, $recipe){
		$query = mysql_db_query("recipe_base", "SELECT `step`.`text` FROM `step`, `recipe` WHERE". 
							  " `recipe`.`name` = '" . $recipe . "' AND `step`.`recipe_id` = `recipe`.`recipe_id`".
							  " ORDER BY `step`.`number`" , $dbcnx);
		return queryResultToArray($query, 'text');
	}
	
	function insertRecipe($dbcnx, $title, $table, $ingredient, $number, $types, $steps, $uid){
		$i = 0;

		$res = mysql_db_query("recipe_base", 
					       	  "INSERT INTO `recipe_base`.`recipe` (`recipe_id`, `name`, `user_id`) VALUES (NULL, '".$title."', ".$uid.")",
					   		  $dbcnx);
		if($res == 0){
			return '<br/>Error sql : ' . "INSERT title.";
		}

		$res = mysql_db_query("recipe_base", 
					       	  "INSERT INTO `recipe_base`.`table_map` (`table_id`, `recipe_id`) VALUES (".
					       	  	"(SELECT `table`.`table_id` FROM `table` WHERE `table`.`name` = '".$table."') ,".
					       	  	"(SELECT `recipe`.`recipe_id` FROM `recipe` WHERE `recipe`.`name` = '".$title."') )",
					   		  $dbcnx);

		for($i = 0; $i < count($ingredient); $i++){
			
			$res = mysql_db_query("recipe_base", 
							   "INSERT INTO `recipe_base`.`ingredient` (`ingredient_id`, `name`) VALUES (NULL, '".$ingredient[$i]."')",
							    $dbcnx);
			$res1 =	mysql_db_query("recipe_base", 
							   "INSERT INTO `recipe_base`.`ingredient_map` (`ingredient_map_id`, `ingredient_id`, `type_id`,`number`, `recipe_id`)".
							   "VALUES (NULL, (SELECT `ingredient`.`ingredient_id` FROM `ingredient` WHERE `ingredient`.`name` = '".$ingredient[$i]."'),".
							   "(SELECT `type`.`type_id` FROM `type` WHERE `type`.`name` = '".$types[$i]."'), ".$number[$i].",".
							   "(SELECT `recipe`.`recipe_id` FROM `recipe` WHERE `recipe`.`name` = '".$title."'))",
							    $dbcnx);
			if($res == 0 || $res1 == 0){
				return '<br/>Error sql : ' . "INSERT ingredients.";
			}	    
		}
		
		for($i = 0; $i < count($steps); $i++){
			
			$res = mysql_db_query("recipe_base", 
							   "INSERT INTO `recipe_base`.`step` (`step_id`, `recipe_id`, `number`, `text`) VALUES (NULL,".
							   "(SELECT `recipe`.`recipe_id` FROM `recipe` WHERE `recipe`.`name` = '".$title."'),".($i + 1).", '".$steps[$i]."')",
							    $dbcnx);
			if($res == 0){
				return '<br/>Error sql : ' . "INSERT steps.";
			}
		}
		return "Success.";
	}

	function updateRecipe($dbcnx, $title, $title_old, $table, $ingredient, $number, $types, $steps){
		$i = 0;

		$res = mysql_db_query("recipe_base", 
					       	  "UPDATE `recipe_base`.`recipe` SET `recipe`.`name` = '".$title."' WHERE `recipe`.`name` = '".$title_old."' ",
					   		  $dbcnx);
		if($res == 0){
			return '<br/>Error sql : ' . "INSERT title.";
		}

		for($i = 0; $i < count($ingredient); $i++){
			
			$res = mysql_db_query("recipe_base", 
							   "UPDATE `recipe_base`.`ingredient` SET `ingredient`.`name` = '".$ingredient[$i]."'".
							   "WHERE `recipe`.`recipe_id` = `ingredient`.`recipe_id` AND `recipe`.`name` = '".$title."'",
							    $dbcnx);
	}
		return "Success.";
	}

	function deleteRecipe($dbcnx, $title){
		$i = 0;

		$res = mysql_db_query("recipe_base", 
					       "DELETE FROM `recipe_base`.`ingredient_map` WHERE `ingredient_map`.`recipe_id` = ".
					       "(SELECT `recipe`.`recipe_id` FROM `recipe` WHERE `recipe`.`name` = '".$title."')",
					   $dbcnx);
		$res = mysql_db_query("recipe_base", 
					       "DELETE FROM `recipe_base`.`step` WHERE `step`.`recipe_id` = ".
					       "(SELECT `recipe`.`recipe_id` FROM `recipe` WHERE `recipe`.`name` = '".$title."')",
					   $dbcnx);
		$res = mysql_db_query("recipe_base", 
					       "DELETE FROM `recipe_base`.`table_map` WHERE `table_map`.`recipe_id` = ".
					       "(SELECT `recipe`.`recipe_id` FROM `recipe` WHERE `recipe`.`name` = '".$title."')",
					   $dbcnx);
		$res = mysql_db_query("recipe_base", 
					       "DELETE FROM `recipe_base`.`recipe` WHERE `recipe`.`name` = '".$title."'",
					   $dbcnx);
		
		return "Success.";
	}
	function likeRecipe($dbcnx, $uid, $title){
		$res = mysql_db_query("recipe_base", 
					       	  "INSERT INTO `recipe_base`.`favorite` ( `user_id`, `recipe_id`) VALUES (".$uid.", ".
					       	  "(SELECT `recipe`.`recipe_id` FROM `recipe` WHERE `recipe`.`name` = '".$title."') )",
					   		  $dbcnx);
	}

	function userIsExists($dbcnx, $login){
		$res = mysql_db_query("recipe_base", "SELECT `user`.`login` FROM `user` WHERE". 
							  " `user`.`login` = '" . $login . "'" , $dbcnx);
		$result = queryResultToArray($res, 'login');
		if (count($result) > 0) {
			return true;
		} else {
			return false;
		}
	}

	function insertUser($dbcnx, $login, $email, $password){
		$res = mysql_db_query("recipe_base", 
					       	  "INSERT INTO `recipe_base`.`user` (`user_id`, `login`, `password`, `email`,`is_admin`) VALUES (NULL,".
					       	  " '".$login."', '".$password."', '".$email."', 0)", $dbcnx);
	}
	function getUserMail($dbcnx, $uid){
		$query = mysql_db_query("recipe_base", "SELECT `user`.`email` FROM `user` ".
								"WHERE `user`.`user_id` = ".$uid." " , $dbcnx);

		return queryResultToArray($query, 'email');
	}

	function queryResultToArray($queryResult, $fieldName){
		$result = [];
		while ($tmp = mysql_fetch_array($queryResult)) {
			array_push($result, $tmp[$fieldName]);	
		}
		return $result;
	}

	function getUser($dbcnx, $login, $password){
		$query = mysql_db_query("recipe_base", "SELECT `user`.`user_id`, `user`.`login`, `user`.`is_admin` FROM `user` ".
								"WHERE `user`.`login` = '".$login."' AND `user`.`password`='".md5($password)."'" , $dbcnx);

		if ($query) {
			return mysql_fetch_array($query);
		} else {
			return array();
		}
	}
?>
