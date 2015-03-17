
<?php 

    $result = find_and_store_all_content(1, 20); 
    // $act_array = find_category_content("act", 14213, 14285);
    // $dance_array = find_category_content("dance", 14213, 14285);
    // $design_array = find_category_content("design", 14213, 14285);
    // $direct_array = find_category_content("direct", 14213, 14285);
    // $manage_array = find_category_content("manage", 14213, 14285);
    // $music_array = find_category_content("music", 14213, 14285);
    // $produce_array = find_category_content("produce", 14213, 14285);
    // $write_array = find_category_content("write", 14213, 14285);

    // $paths_array = get_subscribed_paths();
?>   

<h3 class="h3 carousel__title">Blog</h3>
<br>
<a href="user_list.php">User List</a>

<ul class="nav nav-tabs">
    <li role="presentation"><a data-toggle="tab" href="#all_tab">All</a></li>
</ul>


<!-- all content tab -->
<div class="tab-content">

    <div id="all_tab" class="tab-pane in active fade">
        <div class="single-item">
            <?php foreach( $result as $c_arr ) { ?> 
                <div class="item">
                    <ul>
                        <div class="content__image"><div class="caption"></div><img src="<?php echo $c_arr['data_list_image_list']; ?>"></div>
                        <div class="content__title_button_container">
                            <div class="content__title_category_container">
                                <div class="content__title"><a class="content__title" href="contentpage.php?content_id=<?php echo urlencode($c_arr["data_list_num"]); ?>"><?php echo $c_arr["data_list_title_list"]; ?></a></div>
                                <!-- <div class='jump-link'><a href="#"><?php echo $c_arr["Category"]; ?></a></div>    -->                         
                                <div class='jump-link'><a href="#">Category</a></div>                            
                            </div>
                            <div class="content__buttons">
                                <a class="main-nav glyphicon glyphicon-plus addb-signin content_id btn btn-default contant__button_add" href="#" data-toggle="modal" data-target="#addcontentmodal" id="<?php echo $c_arr['data_list_num']; ?>"></a>
                                <a class="glyphicon glyphicon-eye-open btn btn-default content__button_view" href="<?php echo $c_arr["data_list_pageUrl"]; ?>"></a>
                            </div>
                        </div>
                    </ul>
                </div>
            <?php } ?>   
        </div>
    </div>


</div>