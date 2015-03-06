
<!-- Add Content Modal -->
<div class="modal fade" id="addcontentmodal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Content to Path</h4>
      </div>
      <div class="modal-body"><!-- Body Start -->
        <?php 
        if(isset($_SESSION['user_id'])) { 
            $path_result = get_path_by_user_id( $_SESSION['user_id'] );
            $default_result = get_default_path_by_user_id( $_SESSION["user_id"] ); 
        ?>

        <!-- not default add content -->
        <script>
            $(function() {
                $(".created_post").click(function() {
                    var createdPost = $(this).attr("id");
                    $("#created_post").attr("value", createdPost);
                    console.log(createdPost);
                })
            });
        </script>

        <form action="addcontent.php" method="post">
            <select name="created_path_id">
              <!-- default path -->
                <option value="<?php echo $default_result['default_path_id']; ?>"><?php echo $default_result['default_path_name']; ?></option>
            <?php foreach( $path_result as $path_res ) { ?> 
                <option class="created_post" id="created" value="<?php echo $path_res['created_path_id']; ?>"><?php echo $path_res['created_path_name']; ?></option>
            <?php } ?>
            </select>
            <input type="hidden" id="content_id" name="content_id">
            <input type="hidden" id="created_post" name="created_post">
            <button type="submit" class="btn btn-default" name="submit">Add to Path</button>
        </form>
        <?php
        }   
        ?>
      </div><!-- Body End -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Add Content Modal End -->


<!-- Add Subscribed Path Modal -->
<div class="modal fade" id="addsubpathmodal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are You Sure You Want to Add Subscribed Path?</h4>
      </div>
      <div class="modal-body"><!-- Body Start -->

        <form action="addsubscribedpath.php" method="post">
            <button type="submit" class="btn btn-default" name="submit">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <input type="hidden" id="sub_path" name="subscribed_path_id">
        </form>
    <!-- if click Yes run script else close modal -->

      </div><!-- Body End -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Add Subscribed Path Modal End -->


<!-- Create Path Modal -->
<div class="modal fade" id="createpathmodal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New Path</h4>
      </div>
      <div class="modal-body"><!-- Body Start -->
        <form action="addcreatedpaths.php" method="post">
            <p>New Path Name <input type="text" name="created_path_name"></p>
            <p>Description <input type="text" name="created_path_description"></p>
            <p><button type="submit" class="btn btn-default" name="submit">Save</button>    
            <button type="submit" class="btn btn-default" data-dismiss="modal" name="cancel">Cancel</button></p>
        </form>
      </div><!-- Body End -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Create Path Modal End -->

<!-- Delete Content From Path Modal -->
<div class="modal fade" id="deletecontentmodal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete content?</h4>
      </div>
      <div class="modal-body"><!-- Body Start -->
        <form action="deletecontentfrompath.php" method="post">
            <button type="submit" class="btn btn-default" name="submit">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <input type="hidden" id="content_path_id" name="content_path_id">
            <input type="hidden" id="created_path_id" name="created_path_id">
        </form>
    <!-- if click Yes run script else close modal -->

      </div><!-- Body End -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete Content From Path Modal End -->

<!-- Delete Content From Default Path Modal -->
<div class="modal fade" id="deletedefaultcontentmodal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete content?</h4>
      </div>
      <div class="modal-body"><!-- Body Start -->
        <form action="deletecontentfromdefaultpath.php" method="post">
            <button type="submit" class="btn btn-default" name="submit">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <input type="hidden" id="def_content_path_id" name="def_content_path_id">
            <input type="hidden" id="def_created_path_id" name="def_created_path_id">
        </form>
    <!-- if click Yes run script else close modal -->

      </div><!-- Body End -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete Content From Default Path Modal End -->


<!-- Delete Created Path Modal -->
<div class="modal fade" id="deletecreatedpathmodal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete path?</h4>
      </div>
      <div class="modal-body"><!-- Body Start -->
        <form action="deletecreatedpath.php" method="post">
            <button type="submit" class="btn btn-default" name="submit">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <input type="hidden" id="created_path_and_content_id" name="created_path_id">
        </form>
    <!-- if click Yes run script else close modal -->

      </div><!-- Body End -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete Created Path Modal End -->

<!-- Edit Profile Info Modal Start -->
<div class="modal fade" id="editprofilepage" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit profile information</h4>
      </div>
      <div class="modal-body"><!-- Body Start -->

        <form action="saveprofileinfo.php" method="post">
            <label class="pflabel">Username:</label> <?php echo $_SESSION['username']?><!-- <input align="center" type="text" name="Username">--><br>
            <label class="pflabel">Current City:</label> <input align="center" type="text" name="current_city" ><br>
            <label class="pflabel">Educaton:</label> <input type="text" name="education" ><br>
            <label class="pflabel">Employment:</label> <input type="text" name="employment" ><br>
            <label class="pflabel">Email:</label> <input type="text" name="email" ><br>
            <button type="submit" name="submit">Save Changes</button>
        </form>
    <!-- if click Yes run script else close modal -->

      </div><!-- Body End -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Profile Info Modal End -->