<?php $layout_context = "private"; ?>
<?php $title = "Add Created Path"; ?>
<?php require_once("session.php"); ?>
<?php include("header.php"); ?>
<?php require_once("functions.php"); ?>

<?php confirm_logged_in(); ?>


<?php
if (isset($_POST['submit'])) {
    // Process the form

    $created_path_name = $_POST["created_path_name"];
    // $hashed_password = password_encrypt($_POST["password"]);
    $created_path_description = $_POST["created_path_description"];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO created_path (created_path_name, created_path_description, user_id) VALUES (:created_path_name, :created_path_description, :user_id)";
    $query = $connection->prepare($sql);
    $query->execute(array(
        ":created_path_name" => $created_path_name,
        ":created_path_description" => $created_path_description,
        ":user_id" => $user_id
    ));

    redirect_to("createdpaths.php");
    
}
else {
  // This is probably a GET request
    echo "This is a Get";
} // end: if (isset($_POST['submit']))


?>

