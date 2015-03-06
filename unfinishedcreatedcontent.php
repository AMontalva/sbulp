<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<?php

	$content_id = $_GET["content_id"];
	$created_path_id = $_GET["created_path_id"];
	$finished = 0;

    $stmt = $connection->prepare("UPDATE Content_Created_Path_Table SET finished=:finished WHERE content_id=:content_id AND created_path_id=:created_path_id");
    $stmt->bindValue(':finished', $finished, PDO::PARAM_STR);
    $stmt->bindValue(':content_id', $content_id, PDO::PARAM_INT);
    $stmt->bindValue(':created_path_id', $created_path_id, PDO::PARAM_INT);
    $stmt->execute();

    redirect_to("createdpaths.php");

?>


<?php include("footer.php") ?>
<!--  close connection in footer -->
