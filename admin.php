<?php  
include "controller.php";
include 'init.php';
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
		<div class="container">
			
			<div class="row">
                <div class="col-md-4"></div>
                
                <div class="col-md-4">
                    <div class="general">
                        <div class="row" >

                            <div class="col-md-12">
                                <div style="text-align: center;">
                                    <img src="picture/background2.jpg" width="200" class="img-circle" height="200" style="margin-bottom: 30px;">
                                </div>
                            </div>
                        </div>
			            <form action="admin.php" method="post" class="form-horizontal">
                            <?php
                            $control = new Controller;
                            $control->validateLogin();
                            ?>
                    
				            <div class="form-group">
					            <label for="name" class="control-label col-sm-4">NAME:</label>
						            <div class="col-sm-8">
							            <input type="email" name="email" class="form-control" placeholder="Email" required>
						            </div>
				            </div>
				            <div class="form-group">
					            <label for="pwd" class="control-label col-sm-4">PASSWORD:</label>
						            <div class="col-sm-8">
							            <input type="password" name="password" class="form-control" placeholder="Password" required>
						            </div>
				            </div>
				            <div class="form-group"> 
    				            <div class="col-sm-offset-2 col-sm-10 text-center">
      					            <button type="submit"  name="submit" class="btn btn-danger">Submit</button>
    				            </div>
  				            </div>
			            </form>
                    </div>
                </div>
			</div>
		</div>
		
    
    
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