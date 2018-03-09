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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/admin_css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo base_url(); ?>css/admin_css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/admin_css/font-awesome.min" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/admin_css/style.css" rel="stylesheet" type="text/css" />
    
    <!-- Page Specific CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

     <!-- JavaScript -->
   
    <script  src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/admin_js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>js/admin_js/bootstrap.js"></script>
    <script  src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
    <script  src="<?php echo base_url(); ?>js/custome.js"></script>
    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>js/admin_js/morris/chart-data-morris.js"></script>
    <script src="<?php echo base_url(); ?>js/admin_js/tablesorter/jquery.tablesorter.js"></script>
    <script src="<?php echo base_url(); ?>js/admin_js/tablesorter/tables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
  </head>

  <body onload="myFunction()">

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">SB Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">

            <li class="active">
              <a href="<?php echo base_url(); ?>admin/dashboard">
              <i class="fa fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>admin/actors">
              <i class="fa fa-table"></i> &nbsp; Agent</a>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>admin/directors">
              <i class="fa fa-table"></i> Agency</a>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building"></i> Properties <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">All Properties</a></li>
                <li><a href="#">Another Item</a></li>
                <li><a href="#">Third Item</a></li>
                <li><a href="<?php echo base_url(); ?>admin/amenities">amenities</a></li>
              </ul>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>admin/movies">
              <i class="fa fa-cog"></i> Setting</a>
            </li>

             <li>
              <a href="<?php echo base_url(); ?>admin/multiple_language">
              <i class="fa fa-envelope"></i> Inquiry</a>
            </li>

             <li>
              <a href="<?php echo base_url(); ?>admin/multiple_language">
              <i class="fa fa-users"></i> Register User</a>
            </li>
            
          
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
<?php
                $admin = $this->session->userdata['logged_in']['email'];
                echo $admin;
?>
               <b class="caret">

               </b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('admin/login/logout')?>"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

     <?php echo $content; ?>

    </div><!-- /#wrapper -->
  </body>
</html>
