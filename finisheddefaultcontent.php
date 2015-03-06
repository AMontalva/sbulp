<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<?php

	$content_id = $_GET["content_id"];
	$default_path_id = $_GET["default_path_id"];
	$finished = 1;

    $stmt = $connection->prepare("UPDATE Content_Default_Path_Table SET finished=:finished WHERE content_id=:content_id AND default_path_id=:default_path_id");
    $stmt->bindValue(':finished', $finished, PDO::PARAM_STR);
    $stmt->bindValue(':content_id', $content_id, PDO::PARAM_INT);
    $stmt->bindValue(':default_path_id', $default_path_id, PDO::PARAM_INT);
    $stmt->execute();

    redirect_to("createdpaths.php");

?>


<?php include("footer.php") ?>
<!--  close connection in footer -->
