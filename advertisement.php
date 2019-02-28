<?php
include "controller.php";

if (!isset($_SESSION['email'])){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Jaydee'sPen</title>
     
        <!--============================== Bootstrap css ================================-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--============================== font-awesome css ================================-->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!--============================== google font css ================================-->
        <link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <!--============================== style css ================================-->
        <link href="style.css" rel="stylesheet">
        <!--============================ fevicon ===============================-->
        <link rel="shortcut icon" type="image/png" href="jaydeespen.ico">
        <!--============================== responsive css ================================-->
        <link href="css/responsive.css" rel="stylesheet">

</head>
<body>


	<!--============================== preloader================================-->
      <div id="preloader"></div> 
    <!--============================== top-area-start================================-->
    <section class="top-area">
        <div class="container">
            <div class="row">
                <div class="top-area-content">
                    <div class="col-md-6 col-sm-6 col-xs-5">
                        <div class="logo text-left">
                            <a href="index.php"><img src="jaydee png.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-7">
                        <div class="social-icon text-right">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <!-- <a href=""><i class="fa fa-pinterest"></i></a> -->
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <!-- <a href=""><i class="fa fa-google-plus"></i></a> -->
                            <!-- <a href=""><i class="fa fa-rss"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================== menu-area-start ================================-->
    <section class="menu-area">
        <div class="container">
            <div class="row">
                <div class="menu-area-content clearfix">
                    <div class="col-md-7 col-sm-9 col-xs-12">
                        <div class="main-menu text-left">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                               <ul class="nav navbar-nav">                                       
                                    <li class="active">
                                        <a href="dashboard.php">Home</a>
                                        
                                    </li>
                                    
                                    <li><a href="editCategory.php">Edit Category</a></li>
                                    
                                    <li><a href="editPost.php">Edit Post</a></li>
                                    <li><a href="advertisement.php">Advert</a></li>
                                </ul>
                            </div>    
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-3 col-xs-12">
                        <div class="search-btn text-right">
                            <form>
                                <input type="search" placeholder="Type to search here"/>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
    <div class="row">
    <div class= "col-md-3"></div>
    <div class="col-md-6">
	<div class="general">
		<!-- <h1>The post in this Section is Added to the Individual Categories</h1> -->
		<form  method="post" action="advertisement.php" enctype="multipart/form-data" class="">
			<?php
			$control = new Controller;
			$control->viewAdvert();
			?>
			<input type="url" name="name" placeholder="URL"><br>
			SECTION: <select name="section" required>
				<option value="1">Board 1</option>
				<option value="2">Board 2</option>
				<option value="3">Board 3</option>
				<option value="4">Board 4</option>
                <option value="5">Board 5</option>
								
			</select><br>
			<!-- Type Here:<textarea name="word" cols="65" rows="15"></textarea><Br> -->
			File:<input type="file" name="file"class='inline' ><br>
			<!-- File:<input type="file" name="document_file" class="inline"><br>
			Audio:<input type="file" name="audio_file" class="inline"><Br>
			Video:<input type="file" name="video_file"  class="inline"><br> -->
			<!--<input type="datatime-local" name="datetime"><br>-->
			<input type="submit" name="upload" value="Upload"><input type="reset" name="reset">
		</form>


        <h5>This information listed below must be duely followed for better beautification of each image after posting</h5>
        <h5>
        <ol>
            <li>upload an image with large width and height for <span class="text-danger">Each Board</span>section</li>
            <li>Upload an image with width and height of at least <span class="text-danger">1000 to 500px respectively</span></li>
            <li>Upload an image with height at Most<span class="text-danger"> 400px </span>for the <span class="text-danger">Board 2</span> Section</li>
            <li>Upload an image with height at Most<span class="text-danger"> 250px </span>for the <span class="text-danger">Board 4</span> Section</li>
        </ol>
        </h5>
	</div>
    </div>
    <div class="col-md-3"></div>
    </div>
    </section>


    
    <!-- Editing Section -->
    <section>
        <div class="container">
            <div class="row">

                <div>
                <?php
                    $call = new Controller;
                    $call->deleteAdvert();
                ?>
                <?php
                    $call = new Controller;
                    $call->viewAllAdvert();
                ?>
                    
                </div>
            </div>
        </div>
    </section>

 <!--============================== footer-top-area-start ================================-->    
  
    
        <section class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bottom-text text-center">
                            <p>Jaydee's Blog&copy;All Rights reserved</p>
                            <p>Designed by <span><a href="#">LAGO</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
       </section>
   
    <!--============================== Main jQuery ================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--============================== Bootstrap js ================================-->
        <script src="js/bootstrap.min.js"></script>
    <!--============================== Custom js ================================-->    
        <script src="js/jquery.sticky.js"></script>
        <script src="js/instafeed.min.js"></script>
    <!--============================== Active js ================================-->    
        <script src="js/active.js"></script>
        <!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> -->
        <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
        <!-- <script src="js/wow.min.js"></script> -->
    <!-- <script>
      new WOW().init();
    </script> -->
        
        <script>
            jQuery(document).ready(function($) {  
            // site preloader -- also uncomment the div in the header and the css style for #preloader
            $(window).load(function(){
                $('#preloader').fadeOut('slow',function(){$(this).remove();});
            });
            });
        </script>
    </body>
</html>