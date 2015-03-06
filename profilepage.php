<?php $layout_context = "private"; ?>

<?php require_once("session.php"); ?>
<?php include("header.php"); ?>
<?php require_once("functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 

  $profile_info = find_user_by_user_id($_SESSION["user_id"]);

?>

<div class="container">

  <?php 
    if($layout_context === "private" || isset($_SESSION['user_id'])) { 
        echo display_sidebar(); 
    }   
    ?>

<h1>  
  <font size= "12"><b> Profile Settings </b></font>
</h1>

<div>
	<img  class="pfpic" src="http://www.ssbbs2013.com/assets/fallback/default.png" alt="Profile Picture" style="width:200px;height:200px">
  <button class="glyphicon glyphicon-pencil" style="color:blue" data-toggle="modal" data-target="#editprofilepage"></button>
</div>

<div class="pfinfo">

		<label class="pflabel">Username:</label> <?php echo $_SESSION['username']?><!-- <input align="center" type="text" name="Username">--><br>
		<label class="pflabel">Current City:</label> <?php echo $profile_info["current_city"]?><br>
		<label class="pflabel">Educaton:</label> <?php echo $profile_info['education']?><br>
		<label class="pflabel">Employment:</label> <?php echo $profile_info['employment']?><br>
		<label class="pflabel">Email:</label> <?php echo $profile_info['email']?><br>
	
</div> 


<div class="interests_table">
  <div class="interests_h2">
    Interests
  </div>
  <form>
  <table class="interests" style="width:50%">
    <tr>
      <td class="topic interests">Subject</td>
      <td class="topic interests" align="center">Interested</td>
      <td class="topic interests" align="center">Not Interested</td>
      <td class="topic interests" align="center">No Opinion</td>
    </tr>

    <tr>
      <td>Act</td>
      <td align="center"><input type="radio" name="act" value="interested"></td>
      <td align="center"><input type="radio" name="act" value="not_interested"></td>
      <td align="center"><input type="radio" name="act" value="no_opinion"></td>
    </tr>

    <tr>
      <td>Dance</td>
      <td align="center"><input type="radio" name="dance" value="interested"></td>
      <td align="center"><input type="radio" name="dance" value="not_interested"></td>
      <td align="center"><input type="radio" name="dance" value="no_opinion"></td>
    </tr>

    <tr>
      <td>Design</td>
      <td align="center"><input type="radio" name="design" value="interested"></td>
      <td align="center"><input type="radio" name="design" value="not_interested"></td>
      <td align="center"><input type="radio" name="design" value="no_opinion"></td>
    </tr>

    <tr>
      <td>Direct</td>
      <td align="center"><input type="radio" name="direct" value="interested"></td>
      <td align="center"><input type="radio" name="direct" value="not_interested"></td>
      <td align="center"><input type="radio" name="direct" value="no_opinion"></td>
    </tr>

    <tr>
      <td>Manage</td>
      <td align="center"><input type="radio" name="manage" value="interested"></td>
      <td align="center"><input type="radio" name="manage" value="not_interested"></td>
      <td align="center"><input type="radio" name="manage" value="no_opinion"></td>
    </tr>

    <tr>
      <td>Music</td>
      <td align="center"><input type="radio" name="music" value="interested"></td>
      <td align="center"><input type="radio" name="music" value="not_interested"></td>
      <td align="center"><input type="radio" name="music" value="no_opinion"></td>
    </tr>

    <tr>
      <td>Produce</td>
      <td align="center"><input type="radio" name="produce" value="interested"></td>
      <td align="center"><input type="radio" name="produce" value="not_interested"></td>
      <td align="center"><input type="radio" name="produce" value="no_opinion"></td>
    </tr>

    <tr>
      <td>Write</td>
      <td align="center"><input type="radio" name="write" value="interested"></td>
      <td align="center"><input type="radio" name="write" value="not_interested"></td>
      <td align="center"><input type="radio" name="write" value="no_opinion"></td>
    </tr>

  </table>
  </form> 
</div>

</div>

<?php include("footer.php") ?>