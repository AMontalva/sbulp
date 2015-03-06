
<?php 
if(isset($_SESSION['user_id'])) { 
    $path_result = get_path_by_user_id( $_SESSION['user_id'] );
?>
<form action="addcontent.php" method="post">
    <select name="created_path_id">
    <?php foreach( $path_result as $path_res ) { ?> 
        <option value="<?php echo $path_res['created_path_id']; ?>"><?php echo $path_res['created_path_name']; ?></option>
    <?php } ?>
    </select>
    <input type="hidden" id="content_id" name="content_id">
    <input type="submit" name="submit">
</form>
<?php
}   
?>



    <?php 
    $path_set = get_path_by_user_id( $_SESSION["user_id"] ); // get all paths by user id
    foreach($path_set as $path_row) { // loop through paths to get path rows
    ?>
        <h3 class="h3"><?php echo $path_row["created_path_name"]; ?></h3> <!-- output path row -->
        <?php 
        $content_set = get_content_by_path_id( $path_row['created_path_id'] ); // get all content_id's by path id's
        foreach($content_set as $content_row) { // loop through paths to get path rows
        ?>
            <p><?php echo $content_row['content_id']; ?></p> <!-- output content id -->
            <p><?php echo get_content_by_content_id($content_row['content_id'])["Title"]; ?></p> <!-- get content by content_id and output title -->            
        <?php
        }
    }
    ?>



    <!-- add image to created paths -->


    <?php 
    $path_set = get_path_by_user_id( $_SESSION["user_id"] ); // get all paths by user id
    foreach($path_set as $path_row) { // loop through paths to get path rows
    ?>
        <div class="thumbnail created_path__box pull-left">
            <?php 
                $content_set = get_content_by_path_id( $path_row['created_path_id'] ); // get all content_id's by path id's
                foreach($content_set as $content_row) { // loop through paths to get path rows
                $image = get_content_by_content_id($content_row['content_id']);
                // print_r($image);
            }
            ?>
            <img src="<?php echo $image["Image"]; ?>">
            <h3 class="h3 created_path__title"><?php echo $path_row["created_path_name"]; ?></h3> <!-- output path row -->
            <p><?php echo $path_row["created_path_description"]; ?></p>
            <p><?php echo "Number of content in path: " . get_content_count_by_path_id( $path_row['created_path_id'] ); ?></p>
            <p><a href="createdpathpage.php?path_id=<?php echo urlencode($path_row['created_path_id']); ?>&path_name=<?php echo urlencode($path_row['created_path_name']); ?>">Go to Your Path</a></p>
            <p><a href="#" class="delete_created_path" id="<?php echo $path_row['created_path_id']; ?>" data-toggle="modal" data-target="#deletecreatedpathmodal">Delete Path</a></p>
        </div>
    <?php
    }
    ?>





<?php $layout_context = "private"; ?>
<?php $title = "My Created Paths"; ?>

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
                    <label for="search">Search Created Paths</label>
                    <input type="search">
                </div>
                <div class="pull-right"><a href="#" data-toggle="modal" data-target="#createpathmodal">Create New Path</a></div>
            </form>
        </div>
        <br><br><br>

    <?php 
    $path_set = get_path_by_user_id( $_SESSION["user_id"] ); // get all paths by user id
    foreach($path_set as $path_row) { // loop through paths to get path rows
    ?>
        <div class="thumbnail created_path__box pull-left">
            <?php 
                $content_set = get_content_by_path_id( $path_row['created_path_id'] ); // get all content_id's by path id's
            ?>
            <h3 class="h3 created_path__title"><?php echo $path_row["created_path_name"]; ?></h3> <!-- output path row -->
            <p><?php echo $path_row["created_path_description"]; ?></p>
            <p><?php echo "Number of content in path: " . get_content_count_by_path_id( $path_row['created_path_id'] ); ?></p>
            <p><a href="createdpathpage.php?path_id=<?php echo urlencode($path_row['created_path_id']); ?>&path_name=<?php echo urlencode($path_row['created_path_name']); ?>">Go to Your Path</a></p>
            <p><a href="#" class="delete_created_path" id="<?php echo $path_row['created_path_id']; ?>" data-toggle="modal" data-target="#deletecreatedpathmodal">Delete Path</a></p>
        </div>
    <?php
    }
    ?>


    </div><!-- end of main content -->
</div><!-- end of container -->




<?php include("footer.php") ?>








<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css"/>    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>

<!-- newmodal -->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css"> 
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/addButtonStyle.css">   
<!-- newmodal -->

    <style>
    /* slick carousel styles */
        .slick-prev:before, .slick-next:before { 
        color: #2F889A !important;
        font-size: 60px;
        }
        .slick-prev {
          margin-left: 40px;
        }

        .slick-next {
          margin-right: 60px;
        }

        .single-item {
          width: 80%;
          margin-left: auto;
          margin-right: auto;
          display: block;
        }

        .item {
            text-align: center;
            list-style: none;
        }

        .item img {
            width: 100%;
            height: 200px;
        }
    </style>  




</head>
<body>
    <header>
        <div class="container">
            <nav id="header__nav" class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="header__sbu_logo" class="pull-left" href="#"><img src="img/sbu_logo.png" alt="logo for showbiz u"></a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="#">ABOUT</a></li>
                            <li><a href="#">BLOG</a></li>
                            <li><a href="#">VIDEOS</a></li>
                            <li class="active"><a href="#">LEARNING PATHS</a></li>                
                            <li><a href="#">CAREERS</a></li>
                            <li><a href="#">JOIN</a></li>                   
                        </ul>
                    </div>
                </div>
                <img id="triangles" src="img/triangles.png" alt="purple triangles border">  

            <?php if($layout_context === "private" || isset($_SESSION['user_id'])) { ?>
                <div id="header__sign_up_sign_in" class="pull-right">                                        
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?php echo $_SESSION["username"]; ?>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Profile</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Settings</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Interest</a></li>
                          <li role="presentation" class="divider"></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout</a></li>
                        </ul>
                    </div>  
                </div>
            <?php } else { ?>
                <div id="header__sign_up_sign_in" class="pull-right">
                    <?php include("newmodal.php"); ?>
                </div>
            <?php } ?>




                <div id="header__lp_search" class="pull-left">
                    <form class="form-inline" role="form">
                        <div id="header__lp" class="pull-left"><h2 class="h2"><a href="test.php">LEARNING PATHS</a></h1></div>
                        <div id="header__search"><?php include("RandomBox.php") ?></div>
                        <!--<input type="search" class="form-control" id="search" placeholder="Search">
                        <button type="submit" class="btn btn-default">Submit</button>-->   
                    </form>     
                </div>          
            </nav>
        </div>   
    </header>








<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css"/>    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>

<!-- newmodal -->
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300italic' rel='stylesheet' type='text/css'>   
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css"> 
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="css/addButtonStyle.css">   
<!-- newmodal -->

</head>
<body>
    <header>
        <div class="container">
            <nav id="header__nav" class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="header__sbu_logo" class="pull-left" href="#"><img src="img/sbu_logo.png" alt="logo for showbiz u"></a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="#">ABOUT</a></li>
                            <li><a href="#">BLOG</a></li>
                            <li><a href="#">VIDEOS</a></li>
                            <li class="active"><a href="#">LEARNING PATHS</a></li>                
                            <li><a href="#">CAREERS</a></li>
                            <li><a href="#">JOIN</a></li>                   
                        </ul>
                    </div>
                </div>
                <img id="triangles" src="img/triangles.png" alt="purple triangles border">  

            <?php if($layout_context === "private" || isset($_SESSION['user_id'])) { ?>
                <div id="header__sign_up_sign_in" class="pull-right">                                        
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?php echo $_SESSION["username"]; ?>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Profile</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Settings</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Interest</a></li>
                          <li role="presentation" class="divider"></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout</a></li>
                        </ul>
                    </div>  
                </div>
            <?php } else { ?>
                <div id="header__sign_up_sign_in" class="pull-right">
                    <?php include("newmodal.php"); ?>
                </div>
            <?php } ?>




                <div id="header__lp_search" class="pull-left">
                    <form class="form-inline" role="form">
                        <div id="header__lp" class="pull-left"><h2 class="h2"><a href="test.php">LEARNING PATHS</a></h1></div>
                        <div id="header__search"><?php include("RandomBox.php") ?></div>
                        <!--<input type="search" class="form-control" id="search" placeholder="Search">
                        <button type="submit" class="btn btn-default">Submit</button>-->   
                    </form>     
                </div>          
            </nav>
        </div>   
    </header>
