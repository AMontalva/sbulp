<?php $layout_context = "private"; ?>
<?php $title = "Created Paths"; ?>

<?php require_once("session.php"); ?>
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
        <h1 class="h1">Created Paths</h1>
        <div id="thumbnail">
            <form action="createdpaths.php" method="post">
                <div class="pull-left">
                    <h2>Search Created Paths</h2>
                    <input type="search">
                </div>
                <div class="pull-right"><a href="#" data-toggle="modal" data-target="#createpathmodal">Create New Path</a></div>
            </form>
        </div>
        <br><br><br>

    <?php 
    $default_path_set = get_default_path_by_user_id( $_SESSION["user_id"] );
    ?>
        <div class="thumbnail path__item">
            <h3 class="h3 created_path__title"><?php echo $default_path_set["default_path_name"]; ?></h3> <!-- output path row -->
            <p><?php echo $default_path_set["default_path_description"]; ?></p>
            <p><?php echo "Number of content in path: " . get_default_content_count_by_path_id( $default_path_set["default_path_id"] ); ?></p>
            <p><a href="defaultpathpage.php?path_id=<?php echo urlencode($default_path_set['default_path_id']); ?>&path_name=<?php echo urlencode($default_path_set['default_path_name']); ?>">Go to Your Path</a></p>
        </div>
    <?php
    $path_set = get_created_path_by_user_id( $_SESSION["user_id"] ); // get all paths by user id
    foreach($path_set as $path_row) { // loop through paths to get path rows
    ?>
        <div class="thumbnail path__item">
            <h3 class="h3 created_path__title"><?php echo $path_row["created_path_name"]; ?></h3> <!-- output path row -->
            <p><?php echo $path_row["created_path_description"]; ?></p>
            <p><?php echo "Number of content in path: " . get_created_content_count_by_path_id( $path_row['created_path_id'] ); ?></p>
            <p><a href="createdpathpage.php?path_id=<?php echo urlencode($path_row['created_path_id']); ?>&path_name=<?php echo urlencode($path_row['created_path_name']); ?>">Go to Your Path</a></p>
            <p><a href="#" class="delete_created_path" id="<?php echo $path_row['created_path_id']; ?>" data-toggle="modal" data-target="#deletecreatedpathmodal">Delete Path</a></p>
        </div>
    <?php
    }
    ?>


    </div><!-- end of main content -->
</div><!-- end of container -->




<?php include("footer.php") ?>
