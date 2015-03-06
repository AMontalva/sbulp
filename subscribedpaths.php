<?php $layout_context = "private"; ?>
<?php $title = "Subscribed Paths"; ?>

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
        <h1 class="h1">Subscribed Paths</h1>

        <!-- get path_id by user_id -->
        <!-- get path_name path_description by path_id -->

        <?php
        $sub_path_set = get_sub_path_by_user_id( $_SESSION['user_id'] );
        foreach($sub_path_set as $sub_path_row) {
            $sub_path_info_set = get_sub_path_info_by_path_id( $sub_path_row["subscribed_path_id"] );
            foreach($sub_path_info_set as $sub_path_info_row) {
            ?>
            <div class="thumbnail path__item">  
                <p><?php echo $sub_path_info_row["subscribed_path_name"]; ?></p>
                <p><?php echo $sub_path_info_row["subscribed_path_description"]; ?></p>
                <p><a href="subscribedpathpage.php?path_id=<?php echo urlencode($sub_path_info_row["subscribed_path_id"]); ?>">Go to Your Path</a></p>

            </div>
            <?php
            }
        }
        ?>

        <!-- get content_id by path_id -->

        <!-- get content by content_id

    </div><!-- end of main content -->
</div><!-- end of container -->




<?php include("footer.php") ?>
