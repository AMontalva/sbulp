<?php $layout_context = "private"; ?>
<?php require_once("session.php"); ?>

<?php

     if (isset($_GET["path_name"])) {
          $path_name = $_GET["path_name"];
          $path_id = $_GET["path_id"];
          $title = $path_name;
     }
     else {
          $path_name = null;
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
        <h1 class="h1"><?php echo $path_name; ?></h1>
        <br>

<?php 
$total_created_path_count = get_created_content_count_by_path_id( $path_id );
$finished_created_path_count = get_finished_created_content_count_by_path_id( $path_id ); 
$total_finished_percent = $finished_created_path_count / $total_created_path_count * 100;
?>

<div><?php echo floor($total_finished_percent) . "%";  ?></div>
<div id="progressbar"></div>


<ul class="nav nav-tabs">
    <li role="presentation"><a data-toggle="tab" href="#unfinished_tab">Unfinished Content</a></li>
    <li role="presentation"><a data-toggle="tab" href="#finished_tab">Finished Content</a></li>
</ul>


<div class="tab-content">
    <div id="unfinished_tab" class="tab-pane in active fade">
      <?php 
          $unfinished_content_set = get_content_by_path_id_and_finished( $path_id, 0 ); // get all content_id's by path id's
          foreach($unfinished_content_set as $unfinished_content_row) { // loop through paths to get path rows
      ?>
            <div class="thumbnail created_path_page__item">
              <p><?php echo $unfinished_content_row['content_id']; ?></p> <!-- output content id -->
              <p><?php echo get_content_by_content_id($unfinished_content_row['content_id'])["data_list_title_list"]; ?></p> <!-- get content by content_id and output title -->            
              <p><a href="#" class="delete_content" id="<?php echo $unfinished_content_row['content_id']; ?>" value="<?php echo $path_id; ?>" data-toggle="modal" data-target="#deletecontentmodal">Delete From Path</a></p>
              <p><a href="finishedcreatedcontent.php?created_path_id=<?php echo urlencode($path_id); ?>&content_id=<?php echo urlencode($unfinished_content_row['content_id']); ?>">Finished</a></p>

            </div>
      <?php
          }
      ?>
    </div>
    <div id="finished_tab" class="tab-pane fade">
      <?php 
          $finished_content_set = get_content_by_path_id_and_finished( $path_id, 1 ); // get all content_id's by path id's
          if( isset($finished_content_set) ) {
            foreach($finished_content_set as $finished_content_row) { // loop through paths to get path rows
      ?>
              <div class="thumbnail created_path_page__item">
                <p><?php echo $finished_content_row['content_id']; ?></p> <!-- output content id -->
                <p><?php echo get_content_by_content_id($finished_content_row['content_id'])["data_list_title_list"]; ?></p> <!-- get content by content_id and output title -->            
                <a href="#" class="delete_content" id="<?php echo $finished_content_row['content_id']; ?>" value="<?php echo $path_id; ?>" data-toggle="modal" data-target="#deletecontentmodal">Delete From Path</a>
                <p><a href="unfinishedcreatedcontent.php?created_path_id=<?php echo urlencode($path_id); ?>&content_id=<?php echo urlencode($finished_content_row['content_id']); ?>">Unfinished</a></p>
              </div>
          <?php
            }
          }
      ?>

    </div> 

</div>



    </div><!-- end of main content -->
</div><!-- end of container -->




<?php include("footer.php") ?>

<script>
    var total_paths = <?php echo $total_created_path_count ?>;
    console.log(total_paths);
    var finished_paths = <?php echo $finished_created_path_count ?>;
    console.log(finished_paths);
    var percent = (finished_paths / total_paths) * 100;
    console.log(percent);
    $( "#progressbar" ).progressbar({
        value: percent
    });
</script>