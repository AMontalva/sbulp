<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<div class="container">



<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $found_admin = attempt_login($username, $password);
    
    if ($found_admin) {
      // Success
      // Mark user as logged in
      $_SESSION["user_id"] = $found_admin["user_id"];
      $_SESSION["username"] = $found_admin["username"];
      redirect_to("test.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>

<?php include("header.php"); ?>


</div>

<?php include("footer.php") ?>
<!--  close connection in footer -->
