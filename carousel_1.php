<?php 

    $result = find_and_store_all_content(14213, 14220); 
    $act_array = find_category_content("act", 14213, 14285);
    $dance_array = find_category_content("dance", 14213, 14285);
    $design_array = find_category_content("design", 14213, 14285);
    $direct_array = find_category_content("direct", 14213, 14285);
    $manage_array = find_category_content("manage", 14213, 14285);
    $music_array = find_category_content("music", 14213, 14285);
    $produce_array = find_category_content("produce", 14213, 14285);
    $write_array = find_category_content("write", 14213, 14285);

    $paths_array = get_subscribed_paths();
?>   

<h3 class="h3">Blog</h3>
<br>
<a href="user_list.php">User List</a>

<ul class="nav nav-tabs">
    <li role="presentation"><a data-toggle="tab" href="#all_tab">All</a></li>
    <li role="presentation"><a data-toggle="tab" href="#act_tab">Act</a></li>
    <li role="presentation"><a data-toggle="tab" href="#dance_tab">Dance</a></li>
    <li role="presentation"><a data-toggle="tab" href="#design_tab">Design</a></li>
    <li role="presentation"><a data-toggle="tab" href="#direct_tab">Direct</a></li>
    <li role="presentation"><a data-toggle="tab" href="#manage_tab">Manage</a></li>
    <li role="presentation"><a data-toggle="tab" href="#music_tab">Music</a></li>
    <li role="presentation"><a data-toggle="tab" href="#produce_tab">Produce</a></li>
    <li role="presentation"><a data-toggle="tab" href="#write_tab">Write</a></li>
    <li role="presentation"><a data-toggle="tab" href="#paths_tab">Paths</a></li>
</ul>


<!-- all content tab -->
<div class="tab-content">
    <div id="all_tab" class="tab-pane in active fade">
        <div class="single-item">
            <?php foreach( $result as $c_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $c_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($c_arr["ContentID"]); ?>"><?php echo $c_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $c_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $c_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $c_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>   
        </div>
    </div>
<!-- act content tab -->
    <div id="act_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $act_array as $act_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $act_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($act_arr["ContentID"]); ?>"><?php echo $act_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $act_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $act_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $act_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>     
<!-- dance content tab -->
    <div id="dance_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $dance_array as $dance_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $dance_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($dance_arr["ContentID"]); ?>"><?php echo $dance_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $dance_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $dance_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $dance_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>    
<!-- design content tab -->
    <div id="design_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $design_array as $design_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $design_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($design_arr["ContentID"]); ?>"><?php echo $design_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $design_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $design_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $design_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>       
<!-- direct content tab -->
    <div id="direct_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $direct_array as $direct_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $direct_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($direct_arr["ContentID"]); ?>"><?php echo $direct_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $direct_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $direct_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $direct_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>    
<!-- manage content tab -->
    <div id="manage_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $manage_array as $manage_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $manage_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($manage_arr["ContentID"]); ?>"><?php echo $manage_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $manage_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $manage_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $manage_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>    
<!-- music content tab -->
    <div id="music_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $music_array as $music_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $music_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($music_arr["ContentID"]); ?>"><?php echo $music_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $music_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $music_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $music_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>  
<!-- produce content tab -->
    <div id="produce_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $produce_array as $produce_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $produce_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($produce_arr["ContentID"]); ?>"><?php echo $produce_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $produce_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $produce_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $produce_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>  
<!-- write content tab -->
    <div id="write_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $write_array as $write_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $write_arr['Image']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($write_arr["ContentID"]); ?>"><?php echo $write_arr["Title"]; ?></a></div>
                                <div class='jump-link'><a href="#"><?php echo $write_arr["Category"]; ?></a></div>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $write_arr['ContentID']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $write_arr["URL"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>  
<!-- paths content tab -->
    <div id="paths_tab" class="tab-pane fade">
        <div class="single-item">
            <?php foreach( $paths_array as $paths_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="http://placehold.it/200x200"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><p class="content__title"><?php echo $paths_arr["subscribed_path_name"]; ?></p></div>
                                <div><?php echo $paths_arr["subscribed_path_description"]; ?></div>
                                <p><a href="subscribedpathpage.php?path_id=<?php echo urlencode($paths_arr["subscribed_path_id"]); ?>">Go to Subscribed Path</a></p>
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin sub_path btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addsubpathmodal" id="<?php echo $paths_arr['subscribed_path_id']; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>  
</div>