<?php

$user = 'root';
$pass = '';

  try {
        $connection = new PDO ('mysql:host=localhost;dbname=sbulp_db', $user, $pass); 
        // new PDO (driver:host=servernumber, db_name=database_name, username, password);   
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // allow errors
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

    $query = $connection->query("SELECT * FROM content WHERE data_list_num < 50"); 
	
	$content_array = array();
	
	while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
		$content_array[]=$row;
	}

	foreach($content_array as $c_arr) {
	?>	
		<p><?php echo $c_arr["data_list_num"]; ?></p>
		<br>
		<p><?php echo $c_arr["data_list_title_list"]; ?></p>
		<br>
		<p><?php echo $c_arr["data_list_summary_list"]; ?></p>
		<br>
		<p class="content__img"><img src="<?php echo $c_arr["data_list_image_list"]; ?>" width="150px;"></p>
		<br>
	<?php

	}


 ?>   