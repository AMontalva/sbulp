<?php $layout_context = "private"; ?>
<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
    // Process the form

    $content_path_id = $_POST["content_path_id"];
    $created_path_id = $_POST["created_path_id"];

	delete_content_from_path($content_path_id, $created_path_id);
	redirect_to("createdpaths.php");

}
else {
  // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>



