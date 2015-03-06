<?php
     if (isset($_GET["content_id"])) {
          $content_id = $_GET["content_id"];
          $title = $content_id;
     }
     else {
          $content_id = null;
     }

?>

<?php include("header.php") ?>
<?php require_once("functions.php") ?>

<?php $content_page_array = get_content_by_content_id($content_id); ?>


<div class="container">
	<a href="http://antoniotest.azurewebsites.net/test.php">Back to test page</a><br/>
	<ul>
		<li><?php echo $content_page_array['ContentID']; ?></li>
		<li><?php echo $content_page_array['Image']; ?></li>
		<li><img src="<?php echo $content_page_array['Image']; ?>" class="contentimg"></li>
		<li><?php echo $content_page_array['Title']; ?></li>
		<li><a href=<?php echo $content_page_array["URL"]; ?> class="scrollbar">Click to View!</a></li>
		<li><?php echo $content_page_array['Category']; ?></li>
	</ul>
</div>


<?php include("footer.php") ?>
<!--  close connection in footer -->
