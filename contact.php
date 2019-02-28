<?php
include "controller.php";
include 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Jadee'sPen</title>
     
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

           <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                           <a href="http://www.facebook.com/jaydeespen"><i class="fa fa-facebook"></i></a>
                                    <a href="http://www.twitter.com/queen_jhudie"><i class="fa fa-twitter"></i></a>
                                    <!-- <a href=""><i class="fa fa-pinterest"></i></a> -->
                                    <a href="http//:www.instagram.com/jaydeespen"><i class="fa fa-instagram"></i></a>
                                    
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
                                        <a href="index.php">Home</a>
                                        
                                    </li>
                                    <li><a href="#category">Categories</a>
                                        <ul class="sub-menu clearfix">
                                            <?php
                                            $control = new Controller;
                                            $control->serviceLink();
                                            ?>

                                        </ul>
                                    </li>
                                    <!-- <li><a href="about-me.html">About me</a></li> -->
                                    
                                    <li><a href="media.php">Multimedia</a></li>
                                    <li><a href="contact.php">Contact</a></li>
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
    <!--============================== categories-area-start ================================-->
	<section class="contact-area">
		<div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="contact-content-border">
                        <div class="contact-content">
                            <h4>Contact</h4>
                            <form action="mail.php" method="post">
                                <input type="text" name="username" placeholder="Name">
                                <input type="email" name="email_address" placeholder="Email">
                                <div class="web-address"><input type="text" name="web_address" class="web-address" placeholder="Website"></div>
                                <textarea placeholder="Comment" name="messages"></textarea>
                                <div class="submit-btn"><input type="submit" name="submit" value="send"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>	
    <!--============================== footer-top-area-start ================================-->  
	<section class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="footer-logo">
                        <a href="index.php"><img src="jaydee png.png" alt=""></a>
                    </div>
                    <div class="footer-content">
                        <p>get in touch</p>
                        <div class="footer-social-icon">
                            <a href="http://www.facebook.com/jaydeespen"><i class="fa fa-facebook"></i></a>
                                    <a href="http://www.twitter.com/queen_jhudie"><i class="fa fa-twitter"></i></a>
                                    <!-- <a href=""><i class="fa fa-pinterest"></i></a> -->
                                    <a href="http//:www.instagram.com/jaydeespen"><i class="fa fa-instagram"></i></a>
                                    
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">
                    <div class="subscription-input">
                        <h4 class="footer-title">subscription</h4>
                        <form action="#">
                            <input type="email" placeholder="Email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">
                    <div class="recent-post-content">
                        <h4 class="footer-title">recent post</h4>
                        <?php
                            $call = new Controller;
                            $call->viewRecentPost();
                        ?>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="footer-category">
                        <h4 class="footer-title">category</h4>
                        <ul>
                            <?php
                                $control = new Controller;
                                $control->serviceLink();
                            ?>
                        </ul>
                    </div>
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












