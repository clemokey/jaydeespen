<?php
include "controller.php";
include 'init.php';
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
                                <!-- <form method="post" action="dashboard.php" style="float: left;"><input type="submit" class="btn btn-danger" name="session"></form> -->
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
                            <form method="post" action="dashboard.php">
                                <?php
                                    $control = new Controller;
                                    $control->sessionDestroy();   
                                ?>
                                <!-- <input type="search" placeholder="Type to search here"/> -->
                                <input type="submit" name="session" class="btn btn-danger" value="Sign-Out">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- The main section of the page -->
    <section>
    <div class="row">
        <div class= "col-md-3">
            
        </div>
        <div class="col-md-6">
	        <div class="general">
                <!-- <div class=""> -->
                    <h2 class="text-danger">UPLOAD NEW POST</h2>
		<!-- <h1>The post in this Section is Added to the Individual Categories</h1> -->
		            <form  method="post" action="dashboard.php" enctype="multipart/form-data" class="form-horizontal">
			        <?php
			        $control = new Controller;
			        $control->insertPost();
			        ?>
			<!-- <input type="text" name="name" placeholder="Title of Topic"><br> -->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Title or Topic</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter title" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label for="category">Select Category:</label>
                            <select class="form-control" id="category" name="category" required>
                            <?php
                            $control= new Controller;
                            $control->serviceSelect();
                            ?>
                            </select>
                        </div> 

			             
                        <div class="form-group">
                            <label for="section">Select Section:</label>
                            <select class="form-control" id="section" name="section" required>
				                <option value="3">Favorite Section</option>
				                <option value="4">Popular Section</option>
				                <option value="1">General Section 1</option>
				                <option value="2">General Section 2</option>
				                <option value="5">No Section</option>
                                <option value="6">Carousel</option>				
			                </select>
                        </div>

                        <div class="form-group">
                            <label for="words">Type Here:</label>
                            <textarea class="form-control" rows="15" id="words" name="word" required></textarea>
                        </div><br>
			             <div class="form-group">
                            <p class="text-danger">* Media ID to be included if only you have uploaded it on youtube</p>
                            <!-- <label class="control-label col-sm-2" for="name"></label> -->
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="media" id="media" placeholder="Enter the Youtube ID">
                                </div>
                        </div>
                        <div class="row">
                        <label class="checkbox-inline"><input type="file" name="picture_file" required><b>Picture</b></label>
                        <label class="checkbox-inline"><input type="file" name="document_file"><b>File</b></label>
                        <!-- <label class="checkbox-inline"><input type="file" name="audio_file"><b>Audio</b></label>  -->
                        <!-- <label class="checkbox-inline"><input type="file" name="video_file"><b>Video</b></label>  -->
			             </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="upload" value="Upload" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
		            </form>
                <!-- </div> -->
	       </div>
        </div>
        <div class="col-md-3">
        
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
  
