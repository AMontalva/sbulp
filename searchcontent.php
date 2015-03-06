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

	<h2 class="h2">Search Results</h2>

	<?php
	if(isset($_POST['submit'])) {
		$search = $_POST['search'];

		$query = $connection->prepare('SELECT * FROM Content WHERE Title LIKE :search');
		$query->execute(array('%'.$search.'%'));

		while ($results = $query->fetch())
		{
		?>
			<div class="thumbnail">
				<p><?php echo $results["ContentID"]; ?></p>
				<p><?php echo $results["Title"]; ?></p>
				<p><img src="<?php echo $results['Image']; ?>" width="150px"></p>
			</div>
		<?php
		}
	}
	else {
	}
	?>


    </div>
</div>

<?php include("footer.php") ?>
