<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
    // Process the form

    if($_POST['created_post'] === "created") {
        echo "created path";
        $content_id = $_POST["content_id"];
        $created_path_id = $_POST["created_path_id"];
        // $user_id = $_SESSION["user_id"];
        $finished = 0;

        $sql = "INSERT INTO content_created_path (content_id, created_path_id, finished) VALUES (:content_id, :created_path_id, :finished)";
        $query = $connection->prepare($sql);

        $query->execute(array(
            ":content_id" => $content_id,
            ":created_path_id" => $created_path_id,
            ":finished" => $finished
        ));   
    }
    else {
        echo "default path"; 
        $content_id = $_POST["content_id"];
        $default_path_id = $_POST["created_path_id"];
        // $user_id = $_SESSION["user_id"];
        $finished = 0;

        $sql_default = "INSERT INTO content_default_path (content_id, default_path_id, finished) VALUES (:content_id, :default_path_id, :finished)";
        $query_default = $connection->prepare($sql_default);


        $query_default->execute(array(
            ":content_id" => $content_id,
            ":default_path_id" => $default_path_id,
            ":finished" => $finished
        ));         
    }


    redirect_to("index.php");


}
else {
  // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>


<?php include("footer.php") ?>
<!--  close connection in footer -->
