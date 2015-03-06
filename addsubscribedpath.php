<?php $layout_context = "private"; ?>
<?php $title = "Add Created Path"; ?>
<?php require_once("session.php"); ?>
<?php include("header.php"); ?>
<?php require_once("functions.php"); ?>

<?php confirm_logged_in(); ?>


<?php
if (isset($_POST['submit'])) {
    // Process the form

    print_r($_POST);

    $subscribed_path_id = $_POST["subscribed_path_id"];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO User_Subscribed_Path_Table (subscribed_path_id, user_id) VALUES (:subscribed_path_id, :user_id)";
    $query = $connection->prepare($sql);

    $query->execute(array(
        ":subscribed_path_id" => $subscribed_path_id,
        ":user_id" => $user_id
    ));

    redirect_to("test.php"); 
    
}
else {
  // This is probably a GET request

} // end: if (isset($_POST['submit']))


?>

