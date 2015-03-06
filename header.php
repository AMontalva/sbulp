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
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.15/slick.css"/>    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link href="jquery-ui-1.10.4/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">

<!-- newmodal -->
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/reset.css"> 
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" href="css/addButtonStyle.css">	
<!-- newmodal -->
    <link rel="stylesheet" href="css/styles.css">



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
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="profilepage.php">Profile</a></li>
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
					<form class="form-inline" action="searchcontent.php" method="post">
			    		<div id="header__lp" class="pull-left"><h2 class="h2"><a href="test.php">LEARNING PATHS</a></h1></div>
			    		<div id="header__search">
				        	<input type="text" class="form-control" id="search" placeholder="Search for Content" name="search">
				        	<button type="submit" class="btn btn-default" name="submit">Submit</button>  
			    		</div>
					</form>	    
				</div>	      	
		    </nav>
	    </div>   
	</header>
