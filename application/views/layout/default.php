<script type="text/javascript">    
  function myFunction() 
  {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  } 
</script>

<!doctype html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libraries/font-awesome/css/font-awesome.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libraries/jquery-bxslider/jquery.bxslider.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libraries/flexslider/flexslider.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/realocation.css" media="screen, projection" id="css-main">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" media="screen, projection" id="css-main">

    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/isotope/jquery.isotope.min.js"></script>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gmap3.infobox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gmap3.clusterer.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/bootstrap-sass/vendor/assets/javascripts/bootstrap/transition.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/bootstrap-sass/vendor/assets/javascripts/bootstrap/collapse.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/jquery-bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.chained.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/realocation.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    
    <title>
        Realocation | Modern Real Estate Template
    </title>
</head>

<body onload="myFunction()">

<div id="wrapper">
    <div id="header-wrapper">
        <div id="header">
    <div id="header-inner">
        <div class="header-bar">
            <div class="container">
                <div class="header-infobox">
<?php
                if(empty($this->session->userdata('logged_in')))
                {
                   $email = '';
                   $role = '';
                }
                else
                {
                    $role = $this->session->userdata['logged_in']['role'];
                    $email = $this->session->userdata['logged_in']['email'];
                }

                $CI =& get_instance();
                $CI->load->model('My_Model');
                $data = $CI->My_Model->get_contact_details();              
?>
<?php                    
                    if($email == TRUE)
                    {
                        echo "<strong>Welcome ".$email."</strong>";
                    }
                    else
                    {   
?>                        
                        <strong>E-mail:</strong> 
                        <a href="#"><?php  echo $data->email; ?></a>
<?php
                    }
?>                                   
                </div><!-- /.header-infobox-->

                <div class="header-infobox">
<?php                   if($email == FALSE)
                        {
                            echo '<strong>Phone:</strong>';
                            echo $data->mobile_no;
                        }   
?>
                </div><!-- /.header-infobox-->

                <ul class="header-bar-nav nav nav-register">
<?php               if($email == TRUE)
                    {
?>                     <li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>      
<?php               }  
                    else 
                    {                                                                                
?>                      <li><a href="<?php echo base_url('login');?>">Login</a></li>
                        <li><a href="<?php echo base_url('register');?>">Register</a></li>
<?php               }
?>                        
                    <!-- <li><a href="renew-password.html">Renew Password</a></li> -->
                </ul>            
            </div><!-- /.container -->
        </div><!-- /.header-bar -->

        <div class="header-top">
            <div class="container">
                <div class="header-identity">
                    <a href="<?php echo base_url('home'); ?>" class="header-identity-target">
                        <span class="header-icon"><i class="fa fa-home"></i></span>
                        <span class="header-title">Realocation</span><!-- /.header-title -->
                        <span class="header-slogan">Real Estate &amp; Rental <br> Bussiness Template</span><!-- /.header-slogan -->
                    </a><!-- /.header-identity-target-->
                </div><!-- /.header-identity -->

<?php           
            if(empty($this->session->userdata('logged_in')))
            {
?>                    
                <div class="header-actions pull-right">
                    <a href="<?php echo base_url('agency') ?>" class="btn btn-regular">Create Agency Profile</a>

                </div><!-- /.header-actions -->
<?php                
            }
            if($role == 'agency')
            {
?>          
                 <div class="header-actions pull-right">
                    <a href="<?php echo base_url('agent') ?>" class="btn btn-regular">Create Agent</a>
                    <strong class="separator">or</strong> <a href="<?php echo base_url('property'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>Submit Property</a>
                </div><!-- /.header-actions -->
<?php       }
?>

                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".header-navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.container -->
        </div><!-- .header-top -->

        <div class="header-navigation">
            <div class="container">
                <div class="row">
                    <ul class="header-nav nav nav-pills">
                        <li>
                            <a href="<?php echo base_url('home'); ?>">Home</a>
                        </li>

                        <li>
                            <a href="#">Properties</a>
                        </li>
<?php               if($role == 'agent' || $role == 'agency' || $role == 'user')
                    {
?>                      <li>
                            <a href="#">Agencies</a>
                        </li>
<?php               }                   
                    if($role == 'agent' || $role == 'agency' || $role == 'user')
                    {
?>                      <li>
                            <a href="#">Agents</a>
                        </li>
<?php               }
?>    
                    </ul><!-- /.header-nav -->
                    <div class="form-search-wrapper col-sm-3">
                        <form method="post" action="?" class="form-horizontal form-search">
                            <div class="form-group has-feedback no-margin">
                                <input type="text" class="form-control" placeholder="Search">

                                <span class="form-control-feedback">
                                    <i class="fa fa-search"></i>
                                </span><!-- /.form-control-feedback -->
                            </div><!-- /.form-group -->
                        </form>
                    </div>
                </div>
            </div><!-- /.container -->
        </div><!-- /.header-navigation -->
    </div><!-- /.header-inner -->
</div><!-- /#header -->    
</div><!-- /#header-wrapper -->

   
   <?php echo $content; ?>            


    <div id="footer-wrapper">
        <div id="footer">
            <div id="footer-inner">
                <div class="footer-top">
    <div class="container">
        <div class="row">
    <div class="widget col-sm-8">
        <h2>Template Features</h2>

        <div class="row">
            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-rocket"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Portal Ready Solution</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->


            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-map-marker"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Directory Features</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->

            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-code"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Superb Source Code</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->

            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-flask"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Most Recent Bootstrap</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->

            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-mobile"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Full Responsive Design</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->

            <div class="feature col-xs-12 col-sm-6">
                <div class="feature-icon col-xs-2 col-sm-2">
                    <div class="feature-icon-inner">
                        <i class="fa fa-search"></i>
                    </div><!-- /.feature-icon-inner -->
                </div><!-- /.feature-icon -->

                <div class="feature-content col-xs-10 col-sm-10">
                    <h3 class="feature-title">Retina Ready</h3>

                    <p class="feature-body">
                        Donec vel tortor eros. Morbi non purus vitae enim semper vehicula.
                    </p>
                </div><!-- /.feature-content -->
            </div><!-- /.feature -->
        </div><!-- /.row -->
    </div><!-- /.widget -->

    <div class="widget col-sm-4">
        <h2>Why Choose Us</h2>

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading active">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Property Management
                        </a>
                    </h4>
                </div><!-- /.panel-heading -->

                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    </div><!-- /.panel-body -->
                </div><!-- /.panel-heading -->
            </div><!-- /.panel -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Lifetime Updates
                        </a>
                    </h4>
                </div><!-- /.panel-heading -->

                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    </div><!-- /.panel-body -->
                </div><!-- /.panel-collapse -->
            </div><!-- /.panel -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Free Theme Support
                        </a>
                    </h4>
                </div><!-- /.panel-heading -->

                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    </div><!-- /.panel-body -->
                </div><!-- /.panel-collapse -->
            </div><!-- /.panel -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Rich Documentation
                        </a>
                    </h4>
                </div><!-- /.panel-heading -->

                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    </div><!-- /.panel-body -->
                </div><!-- /.panel-collapse -->
            </div><!-- /.panel -->
        </div><!-- /.panel-group -->
    </div><!-- /.widget-->
</div><!-- /.row -->

        <hr>

        <div class="row">
    <div class="col-sm-9">
        <ul class="footer-nav nav nav-pills">
            <li><a href="#">Home</a></li>
            <li><a href="#">Properties</a></li>
            <li><a href="#">Agents</a></li>
            <li><a href="#">Agencies</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
        </ul><!-- /.footer-nav -->
    </div>

    <div class="col-sm-3">
        <form method="post" action="?" class="form-horizontal form-search">
            <div class="form-group has-feedback no-margin">
                <input type="text" class="form-control" placeholder="Search">

                                        <span class="form-control-feedback">
                                            <i class="fa fa-search"></i>
                                        </span><!-- /.form-control-feedback -->
            </div><!-- /.form-group -->
        </form>
    </div>
</div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.footer-top -->
                <div class="footer-bottom">
                    <div class="container">
                        <p class="center no-margin">
                            &copy; 2014 Your Company, All Right reserved
                        </p>

                        <div class="center">
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul><!-- /.social -->
                        </div><!-- /.center -->
                    </div><!-- /.container -->
                </div><!-- /.footer-bottom -->
            </div><!-- /#footer-inner -->
        </div><!-- /#footer -->
    </div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->


</body>
</html>