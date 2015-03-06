<?php $layout_context = "public"; ?>
<?php $title = "Home"; ?>
<?php require_once("session.php"); ?>
<?php include("header.php"); ?>
<?php require_once("functions.php"); ?>
     
<div class="container">
    <?php 
    if($layout_context === "private" || isset($_SESSION['user_id'])) { 
        echo display_sidebar(); 
    }   
    ?>

    <div id="main"
    <?php 
        if($layout_context === "private" || isset($_SESSION['user_id'])) { 
            echo "class=\"main col-md-10\"";
        } 
    ?>
    > 

<?php
    $num = 3 + 4;
?>

<script type="text/javascript">
    // numeric value, both with and without quotes
    var num = <?php echo $num ?>; // 7
    console.log(num);

</script>

<?php include("carousel_1.php"); ?>

<?php include("carousel_2.php"); ?>

<?php include("carousel_3.php"); ?>

    </div>
</div>

<?php include("footer.php") ?>
