<?php $layout_context = "private"; ?>
<?php require_once("session.php"); ?>

<?php

     if (isset($_GET["path_id"])) {
          $path_id = $_GET["path_id"];
     }
     else {
          $path_id = null;
     }

?>

<?php include("header.php"); ?>
<?php require_once("functions.php"); ?>

<?php confirm_logged_in(); ?>


<div class="container">
    <?php 
    if($layout_context === "private" || isset($_SESSION['user_id'])) { 
        echo display_sidebar(); 
    }   
    ?>

    <div id="main"
    <?php 
        if($layout_context === "private" || isset($_SESSION['user_id'])) { 
            echo "class=\"main col-md-10\">";
        } 
    ?> 
        

  <?php 
  $sub_path_info_set = get_sub_path_info_by_path_id( $path_id );
  foreach($sub_path_info_set as $sub_path_info_row) {
  ?>
    <h1 class="h1"><?php echo $sub_path_info_row["subscribed_path_name"]; ?></h1>
    <?php
    $content_set = get_content_by_sub_path_id( $path_id );
      foreach($content_set as $content_row) { // loop through paths to get path rows
    ?>
        <div class="thumbnail created_path_page__item">
          <p><?php echo $content_row['content_id']; ?></p> <!-- output content id -->
          <p><?php echo get_content_by_content_id($content_row['content_id'])["Title"]; ?></p> <!-- get content by content_id and output title -->            
        </div>
    <?php
    }
  }
  ?>


    </div><!-- end of main content -->
</div><!-- end of container -->




<?php include("footer.php") ?>
