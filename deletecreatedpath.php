<?php $layout_context = "private"; ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
    // Process the form

    $created_path_id = $_POST["created_path_id"];

	delete_created_path($created_path_id);
	redirect_to("createdpaths.php");

}
else {
  // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>

