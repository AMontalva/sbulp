
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 

        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.3.7/slick.min.js"></script>


        <!-- newmodal -->
        <script src="js/modernizr.js"></script> 
        <!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
        <script src="js/main.js"></script>
        <!-- newmodal -->
<!-- <script src="jquery-ui-1.10.4/js/jquery-1.10.2.js"></script> -->
<script src="jquery-ui-1.10.4/js/jquery-ui-1.10.4.custom.js"></script>


        <script>
            $(document).ready(function(){
              $('.single-item').slick({
                lazyLoad: 'progressive',                
                slidesToShow: 4,
                slidesToScroll: 4,
                arrows: true,
                dots: true
             });  
            });

        </script>



        <script>
            $(function() {
                $(".content_id").click(function() {
                    var idName = $(this).attr("id");
                    $("#content_id").attr("value", idName);
                    console.log(idName);
                })
            });            
        </script>

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

        <!-- add subscribed path -->
        <script>
            $(function() {
                $(".sub_path").click(function() {
                    var subPath = $(this).attr("id");
                    $("#sub_path").attr("value", subPath);
                    console.log(subPath);
                })
            });
        </script>


        <script>
            $(function() {
                $(".delete_content").click(function() {
                    var content_path_id = $(this).attr("id");
                    $("#content_path_id").attr("value", content_path_id);
                    console.log(content_path_id);

                    var created_path_id = $(this).attr("value");
                    $("#created_path_id").attr("value", created_path_id);
                    console.log(created_path_id);
                })
            });   
        </script>

        <!-- delete default content -->
        <script>
            $(function() {
                $(".delete_default_content").click(function() {
                    var def_content_path_id = $(this).attr("id");
                    $("#def_content_path_id").attr("value", def_content_path_id);
                    console.log(def_content_path_id);

                    var def_created_path_id = $(this).attr("value");
                    $("#def_created_path_id").attr("value", def_created_path_id);
                    console.log(def_created_path_id);
                })
            });   
        </script>

        <script>
            $(function() {
                $(".delete_created_path").click(function() {
                    var created_path_id = $(this).attr("id");
                    $("#created_path_and_content_id").attr("value", created_path_id);
                    console.log(created_path_id);
                })
            });   
        </script>

        <script>
          $(function() {
            $('.content__image').hover(
                function() {
                    var w = $(this).width();
                    var h = $(this).height();

                    $(".caption").css({"width": w, "height": h});
                    $(this).find('.caption').fadeIn(250);
                    console.log(w, h);
                },
                function() {
                    $(this).find('.caption').fadeOut(250);
                }
            )
        }); 

        </script>



        <br><br><br>

        <?php include("modals.php"); ?>
    </body>
</html>