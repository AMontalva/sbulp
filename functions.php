<!-- connects you to the database, include function to have access to $connection -->
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
    
 ?>   

<?php	


/* 
======================================================================================================
======================================================================================================
index.php, carousel, Content Table related functions
======================================================================================================
======================================================================================================
*/

// does a error check when doing SELECT and returning results
function confirm_query($result_set) {
	if (!$result_set) {
		die("Database query failed.");
	}
}
// seearches CONTENT Table and returns a result between $id_number_1 and $id_number_2
function find_and_store_all_content($id_number_1, $id_number_2) {
	global $connection;
	// 14284
    	$query = $connection->query("SELECT * FROM content WHERE data_list_num BETWEEN '{$id_number_1}' AND '{$id_number_2}'"); 
	
	$content_array = array();
	
	while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
		$content_array[]=$row;
	}
      return $content_array;
	
}



// does search in Content Table and returns returns a result by category_name and between $id_number_1 and $id_number_2
// function find_category_content($category_name, $id_number_1, $id_number_2) {
//     global $connection;
//     $query = $connection->query("SELECT * FROM content WHERE Category='{$category_name}' AND ContentID BETWEEN '{$id_number_1}' AND '{$id_number_2}'"); 
    
//     $cat_array = array();

//     while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
//         $cat_array[]=$row;
//     }

//     return $cat_array;
    
// }

// search for all from Subcribed_Path_Table
function get_subscribed_paths() {
    global $connection;
    $query = $connection->query("SELECT * FROM Subscribed_Path_Table"); 
    
    $sub_path_array = array();

    while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
        $sub_path_array[]=$row;
    }

    return $sub_path_array;
    
}    

// search Content Table by id_number
function get_content_by_content_id($id) {
  global $connection;
  $content_set = $connection->query("SELECT * FROM content WHERE data_list_num = {$id}"); 
  confirm_query($content_set);
  if($content = $content_set->fetch(PDO::FETCH_ASSOC)) {
      return $content;
  } else {
      return null;
  }
}


/* 
======================================================================================================
======================================================================================================
login.php, register.php functions
======================================================================================================
======================================================================================================
*/

// redirects user to another page
function redirect_to($new_location) {
  header("Location: " . $new_location);
  exit;
}

// didn't work
// function password_encrypt($password) {
// $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
//   $salt_length = 22;                    // Blowfish salts should be 22-characters or more
//   $salt = generate_salt($salt_length);
//   $format_and_salt = $hash_format . $salt;
//   $hash = crypt($password, $format_and_salt);
//     return $hash;
// }
    
// didn't work    
// function generate_salt($length) {
//   // Not 100% unique, not 100% random, but good enough for a salt
//   // MD5 returns 32 characters
//   $unique_random_string = md5(uniqid(mt_rand(), true));
  
//     // Valid characters for a salt are [a-zA-Z0-9./]
//   $base64_string = base64_encode($unique_random_string);
  
//     // But not '+' which is valid in base64 encoding
//   $modified_base64_string = str_replace('+', '.', $base64_string);
  
//     // Truncate string to the correct length
//   $salt = substr($modified_base64_string, 0, $length);
  
//     return $salt;
// }
    
// currently used to check password, replace when hashing the password works properly    
function password_checker($password, $existing_hash) {
    // existing hash contains format and salt at start
  // $hash = crypt($password, $existing_hash);
  // echo $hash;
  if ($password === $existing_hash) {
    return true;
  } else {
    return false;
  }
}

// didn't work
// function password_check($password, $existing_hash) {
//     // existing hash contains format and salt at start
//   $hash = crypt($password, $existing_hash);
//   echo $hash;
//   echo $existing_hash;
//   if ($hash === $existing_hash) {
//     return true;
//   } else {
//     return false;
//   }
// }

// checks if username is in the User_Table when logging in
function find_user_by_username($username) {
    global $connection;
    $user_set = $connection->query("SELECT * FROM users WHERE username='{$username}'"); 

    confirm_query($user_set);

    if($user = $user_set->fetch(PDO::FETCH_ASSOC)) {
        return $user;
    } else {
        return null;
    }
}

// get user_id from User_Table
function find_user_by_user_id($user_id) {
    global $connection;
    $user_set = $connection->query("SELECT * FROM users WHERE user_id='{$user_id}'"); 

    confirm_query($user_set);

    if($user = $user_set->fetch(PDO::FETCH_ASSOC)) {
        return $user;
    } else {
        return null;
    }
}

// checks if username and password are correct
// replace password_checker with password_check when it is working properly
function attempt_login($username, $password) {
    $user = find_user_by_username($username);
    if ($user) {
        // found user, now check password
        if (password_checker($password, $user["hashed_password"])) {
            // password matches
            return $user;
        } else {
            // password does not match
            return false;
        }
    } else {
        // user not found
        return false;
    }
}

// create a session with the user_id when a user is logged in
function logged_in() {
    return isset($_SESSION['user_id']);
}

// redirect someone if they are not logged in and trying to view an area for account users
function confirm_logged_in() {
    if (!logged_in()) {
        redirect_to("index.php");
    }
}

// not working since the modal popup was added
function form_errors($errors=array()) {
    $output = "";
    if (!empty($errors)) {
      $output .= "<div class=\"error\">";
      $output .= "Please fix the following errors:";
      $output .= "<ul>";
      foreach ($errors as $key => $error) {
        $output .= "<li>";
            $output .= htmlentities($error);
            $output .= "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output;
}


// when a user logs in, index.php and all pages will have a sidebar added
function display_sidebar() {
  $output = "";
  $output .= "<aside id=\"sidebar\" class=\"col-md-2\">";
  $output .= "<ul>";
  $output .= "<li id=\"sidebar__arrow\"><span class=\"glyphicon glyphicon-menu-hamburger\" aria-hidden=\"true\" style=\"cursor: pointer; font-size: 30px; color: black;\"></span></li>";

  $output .= "<li><a href=\"index.php\">Home</a></li>";
  $output .= "<li><a href=\"createdpaths.php\">Created Paths</a></li>";      
  $output .= "<li><a href=\"subscribedpaths.php\">Subscribed Paths</a></li>";        
  $output .= "</ul>";        
  $output .= "</aside>";
  
  return $output;      
}


/* 
======================================================================================================
======================================================================================================
Created Path functions
======================================================================================================
======================================================================================================
*/

// get user all created paths by user id
function get_created_path_by_user_id($user_id) {
    global $connection;
    $query = $connection->query("SELECT * FROM created_path WHERE user_id = {$user_id}"); 
    $user_created_paths_array = array();
    while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
      $user_created_paths_array[]=$row;
    }
    return $user_created_paths_array;
}

// get all finished content_id by the created_path_id
// $finished = 0 means that they are unfinished
// $finished = 1 means that they are finished
function get_content_by_path_id_and_finished($path_id, $finished) {
  global $connection;
  $query = $connection->query("SELECT * FROM content_created_path WHERE created_path_id = {$path_id} and finished = {$finished}"); 
  $result = array();
  while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
    $result[]=$row;
  }
  return $result;
  

}

// get number of content in a created path
function get_created_content_count_by_path_id($path_id) {
  global $connection;
  $query = $connection->query("SELECT * FROM content_created_path WHERE created_path_id = {$path_id}")->fetchAll(); 
  return count($query);
}

// get number of finished content in a created path
function get_finished_created_content_count_by_path_id($path_id) {
  global $connection;
  $query = $connection->query("SELECT * FROM content_created_path WHERE created_path_id = {$path_id} AND finished = 1")->fetchAll(); 
  // confirm_query($query);
  return count($query);
}


// delete content from a created path
function delete_content_from_path($content_id, $created_path_id) {
  global $connection;
    $stmt = $connection->prepare("DELETE FROM content_created_path WHERE content_id=:content_id AND created_path_id=:created_path_id");
    $stmt->bindValue(':content_id', $content_id, PDO::PARAM_STR);
    $stmt->bindValue(':created_path_id', $created_path_id, PDO::PARAM_STR);
    $stmt->execute();
}

// delete created path and all content inside it
function delete_created_path($created_path_id) {
  global $connection;
    $stmt = $connection->prepare("DELETE FROM content_created_path WHERE created_path_id=:created_path_id");
    $stmt->bindValue(':created_path_id', $created_path_id, PDO::PARAM_STR);
    $stmt->execute();   

    $stmt2 = $connection->prepare("DELETE FROM created_path WHERE created_path_id=:created_path_id");
    $stmt2->bindValue(':created_path_id', $created_path_id, PDO::PARAM_STR);
    $stmt2->execute();     
}



/* 
======================================================================================================
======================================================================================================
Default Path functions
======================================================================================================
======================================================================================================
*/

// get default path of a user
function get_default_path_by_user_id($user_id) {
  global $connection;
  $query = $connection->query("SELECT * FROM default_path WHERE user_id = {$user_id}"); 
  $user_default_paths_array = array();
  $row = $query->fetch(PDO::FETCH_ASSOC);

  return $row;
}

// get all content connected to a default path
// $finished = 0 means that they are unfinished
// $finished = 1 means that they are finished
function get_content_by_default_path_id_and_finished($path_id, $finished) {
  global $connection;
  $result = array();
  $query = $connection->query("SELECT * FROM content_default_path WHERE default_path_id = {$path_id} and finished = {$finished}"); 
  while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
    $result[]=$row;
  }
  return $result;
}


// get the number of content inside a default path
function get_default_content_count_by_path_id($path_id) {
  global $connection;
  $query = $connection->query("SELECT * FROM content_default_path WHERE default_path_id = {$path_id}")->fetchAll(); 
  return count($query);
}

// get number of finished content in a created path
function get_finished_default_content_count_by_path_id($path_id) {
  global $connection;
  $query = $connection->query("SELECT * FROM content_default_path WHERE default_path_id = {$path_id} AND finished = 1")->fetchAll(); 
  return count($query);
}



// delete content inside a default path
function delete_content_from_default_path($content_id, $default_path_id) {
  global $connection;
  $stmt = $connection->prepare("DELETE FROM content_default_path WHERE content_id=:content_id AND default_path_id=:default_path_id");
  $stmt->bindValue(':content_id', $content_id, PDO::PARAM_STR);
  $stmt->bindValue(':default_path_id', $default_path_id, PDO::PARAM_STR);
  $stmt->execute();
}

/* 
======================================================================================================
======================================================================================================
Subscribed Path functions
======================================================================================================
======================================================================================================
*/

// get all subscribed path ids of a user
function get_sub_path_by_user_id($user_id) {
  global $connection;
  $query = $connection->query("SELECT * FROM User_Subscribed_Path_Table WHERE user_id = {$user_id}"); 
  $user_sub_paths_array = array();
  while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
    $user_sub_paths_array[]=$row;
  }
  return $user_sub_paths_array;
}

// get all subscribed path name, description and id of a subscribed path
function get_sub_path_info_by_path_id($path_id) {
  global $connection;
  $query = $connection->query("SELECT * FROM Subscribed_Path_Table WHERE subscribed_path_id = {$path_id}"); 
  $sub_paths_array = array();
  while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
    $sub_paths_array[]=$row;
  }
  return $sub_paths_array;
}

// get all content inside a subscribed path
function get_content_by_sub_path_id($path_id) {
  global $connection;
  $query = $connection->query("SELECT * FROM Content_Subscribed_Path_Table WHERE subscribed_path_id = {$path_id}"); 
  while( $row = $query->fetch(PDO::FETCH_ASSOC) ) {
    $result[]=$row;
  }
  return $result;
}





?>



