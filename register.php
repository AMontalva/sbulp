<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
    // Process the form

    // validations
    $required_fields = array("username", "password");
    validate_presences($required_fields);

    $fields_with_max_lengths = array("username" => 30);
    validate_max_lengths($fields_with_max_lengths);

    if (empty($errors)) {
        // Perform Create

        $username = $_POST["username"];
        // $hashed_password = password_encrypt($_POST["password"]);
        $hashed_password = $_POST["password"];

        $sql = "INSERT INTO users (username, hashed_password) VALUES (:username, :hashed_password)";
        $query = $connection->prepare($sql);

        $query->execute(array(
            ":username" => $username,
            ":hashed_password" => $hashed_password
        ));



        $user_default = find_user_by_username($username);
        $default_path_name = $username . "'s Default Path";
        $default_path_description = "Your default path";
        $user_id = $user_default['user_id'];

        $sql_default = "INSERT INTO default_path (default_path_name, default_path_description, user_id) VALUES (:default_path_name, :default_path_description, :user_id)";
        $query_default = $connection->prepare($sql_default);

        $query_default->execute(array(
            ":default_path_name" => $default_path_name,
            ":default_path_description" => $default_path_description, 
            ":user_id" => $user_id
        ));        

        redirect_to("index.php");
    }
}
else {
  // This is probably a GET request

} // end: if (isset($_POST['submit']))

?>
