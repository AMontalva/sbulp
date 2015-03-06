<?php include('session.php'); ?>
<?php include('functions.php'); ?>

<?php
if (isset($_POST['submit'])) {
    // Process the form

    $user_id = $_SESSION["user_id"]; 
    $current_city = $_POST["current_city"]; 
    $education = $_POST["education"];
    $employment = $_POST["employment"];
    $email = $_POST["email"];


    $stmt = $connection->prepare("UPDATE User_Table_03 SET current_city=:current_city, education=:education, employment=:employment, email=:email WHERE user_id=:user_id");
 
    $stmt->bindValue(':current_city', $current_city, PDO::PARAM_STR);
    $stmt->bindValue(':education', $education, PDO::PARAM_STR);
    $stmt->bindValue(':employment', $employment, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    $stmt->execute();

    redirect_to("profilepage.php");
}
else {
  // This is probably a GET request
    echo 'else';
} // end: if (isset($_POST['submit']))

?>


