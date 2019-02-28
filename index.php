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
                                    <a href="http://www.instagram.com/jaydeespen"><i class="fa fa-instagram"></i></a> 
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
    <!--============================== slider-area-start ================================-->
    <section class="slider-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                       <div class="item active">
                            <div class="slider-content">
                            	<img src="picture/background1.jpg">
                                <div class="col-md-5 col-md-offset-6 col-sm-8 col-sm-offset-2 col-xs-12">
                                	<div class="">
                                	<div class="slide-text-border-content carousel-caption">
                                	    <div class="slide-text">
                                            <h2>Welcome To My Blog!</h2>
                                            <p></p>
                                            <a href="about-me.php">About Me..</a>
                                	    </div>
                                	</div>
                                	</div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        
						$control = new Controller;
						$control->viewCarouselSection('6');
				
                        ?>
                    </div>
                    <!-- Controls -->
                       <a class="left slide-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-right"></i>
                       </a>
                       <a class="right slide-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-left"></i>
                       </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================== about-area-start ================================-->
    <section class="about-area">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="about-area-all-content">
    					<div class="about-area-content">
							<div class="about-photo-content">
								<img style="width:176px; height: 176px;" src="picture/profile.jpg" alt="">
							</div>
							<div class="about-text-content">
								<h4><a href="about-me.php">Hello, I’m <span class="color">Judith!<span></a></h4>
								<p>Words are disputably the most powerful tools for breaking, hurting, even destroying anyone emotionally, psychologically or otherwise.


What if we decide instead to use them to heal, build, revive and give life?

Why don't we try this alternative "Healing and ‘Life-ing’" experiment together here?


You in for it? Then, Welcome aboard to WORDS ARE INDISPENSABLE Aircraft! ✈️

Fasten your seat belt... Ready???... Let's Ride!!! ✍🏾</p>
								<div class="social-link-about">
									<a href="http://www.facebook.com/jaydeespen"><i class="fa fa-facebook"></i></a>
                                    <a href="http://www.twitter.com/queen_jhudie"><i class="fa fa-twitter"></i></a>
                                    <!-- <a href=""><i class="fa fa-pinterest"></i></a> -->
                                    <a href="http://www.instagram.com/jaydeespen"><i class="fa fa-instagram"></i></a>
									
								</div>
							</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <!--============================== categories-area-start ================================-->
	<section class="categories-area">
		<div class="container">
			<div class="row">

				<!-- First header Section -->

				<?php
					$control = new Controller;
					$control->viewFavoriteSection('1');
				?>






				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="row">

                        <div class="hide-category">
						<div class="category-widget-single">
							<div class="category-widget-single-detail">
								<div class="category-title">
									<h4 id="category" style="color:red;">Categories</h4>
								</div>
								<div class="category-list">
									<ul class="left-portion">
										<?php
										$control = new Controller;
										$control->serviceLink();
										?>
										
									</ul>
								</div>
							</div>
						</div>
                        </div>
					</div>
					<div class="row">
						<div class="category-widget-single">
							<div class="category-widget-single-ad">
								<!-- <h3>This is an adevertisement section</h3> -->
								<!-- <a href="#"><img src="img/category-widget-ad.png" alt=""></a> -->
								<?php
									$control = new Controller;
									$control->showAdvert1('1');
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--============================== video-area-start ================================-->
	<section class="video-area">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="video-area-border-content advert">
						<div class="advert2">
							<div class="video-area-content-detail">
							<div>
								<!-- <a href=""><img src="advert/update.jpeg" alt=""></a> -->
								<?php
									$control = new Controller;
									$control->showAdvert1('2');
								?>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="">
					<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="instagram-content">
						<div class="row">
							<div class="col-md-12"><div class="instagram-title"><h4 style="color:red;">Instagram</h4></div></div>
						</div>
						<div class="row">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                               <div id="instafeed">
                               			
                               </div>
                           </div>
                        </div>
						<div class="row">
							<div class="follow-me-section">
							    <!-- <div class="about-photo-content category-page-single">
                                    <img src="img/fahi.png" alt="">
                                </div> -->
								<div class="follow-me-title"><h4 style="color:red;">News</h4></div>
								
									<script type="text/javascript" src="http://output27.rssinclude.com/output?type=js&amp;id=1201520&amp;hash=d790398f769b811e2e07b7c55f604d3c"></script>

								
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>  
    <!--============================== feature-post-area-start ================================-->
    <section class="feature-post-area">
		<div class="container">
			<div class="row">
				<?php
					$control = new Controller;
					$control->viewFavoriteSection('2');
				?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="popular-post-border-content">
						<div class="popular-post-content">
							<div class='row'>
								<div class='col-md-12 col-sm-12'>
									<div class='popular-post-title'>
										<h4 style="color:red;">Popular posts</h4>
									</div>
								</div>
							</div>
							<?php
								$call = new Controller;
								$call->viewPopularSection('4');
							?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--============================== Advertisement 2 ================================-->
    <section class="audio-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="video-area-border-content">
						<!-- <div class="col-md-6 col-sm-6"> -->
							<div class="video-area-content-detail">
								
							<div class="advert4">
								<!-- <a href=""><img src="advert/k.jpg" alt=""></a> -->
								<?php
									$control = new Controller;
									$control->showAdvert1('4');
								?>
							</div>

							</div>
						
					</div>
				</div>
			</div>
		</div>
	</section> 
    <!--============================== my-passion-area-start ================================-->  
	<section class="my-passion-area">
		<div class="container">
			<div class="row">
				<?php
					$control = new Controller;
					$control->viewFavoriteSection('3');
				?>
				         
			</div>
		</div>
	</section>
    <!--============================== asked-section-area-start ================================--> 
    <section class="asked-section-area">
        <div class="container">
            <div class="row">


            	<! the chat forum section -->
                <!-- <div class="col-md-8">
                    <div class="asked-section-border-content">
                        <div class="asked-section-content">
                            <span>20 Dec, 2015</span>
                            <p>Abraham <span>Asked :</span></p>
                            <h4>What is your favorite color?</h4>
                            <div class="comment-bar-border">
                                <div class="comment-text">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque latis et quasi architecto beatae vitae dicta sunt explicabo. illo inventore veritatis et quasi architecto beatae vitae....</p>
                                    <span class="ask">#ask</span>
                                    <div class="comment-like">
                                        <p><i class="fa fa-heart-o"></i><a href="">5 likes</a></p>
                                        <p><i class="fa fa-comment-o"></i><a href="">10 comments</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12 col-xs-12">
                    <div class="asked-section-border-content">
                        <div class="asked-section-content">
                        	<div class= "advert5">
                           	 	<?php
									$control = new Controller;
									$control->showAdvert1('5');
								?>
							</div>
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
                                    
                                    <a href="http://www.instagram.com/jaydeespen"><i class="fa fa-instagram"></i></a>
                        </div>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">
					<div class="subscription-input">
						<h4 class="footer-title" style="color:red;">subscription</h4>
						<form action="#">
						    <input type="email" placeholder="Email">
						    <input type="submit" value="Subscribe">
						</form>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-0">
					<div class="recent-post-content">
						<h4 class="footer-title" style="color:red;">RECENT POST</h4>
						<?php
							$call = new Controller;
							$call->viewRecentPost();
						?>
					</div>
				</div>
				<div class="col-md-2 col-sm-2">
					<div class="footer-category">
						<h4 class="footer-title" style="color: red;">category</h4>
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
						<p>Designed by <span><a href="admin.php">LAGO</a></span></p>
					</div>
				</div>
			</div>
		</div>
   </section>
   
    <!--============================== Main jQuery ================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
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
 












