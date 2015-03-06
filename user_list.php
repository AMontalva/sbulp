<?php require_once("session.php"); ?>
<?php include("header.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<div class="container">
<?php 

		global $connection;
      	$query = $connection->query("SELECT * FROM User_Table_03"); 
		$user_array = array();
		while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
			$user_array[]=$row;
		}
		echo '<pre>', print_r($user_array), '</pre>';
?>
</div>

<?php include("footer.php"); ?>