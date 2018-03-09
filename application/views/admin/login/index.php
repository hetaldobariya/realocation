<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link href="<?php echo base_url(); ?>css/admin_css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/admin_css/style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min"></script>
	<script type="text/javascript">

		// validation rules example
    // Wait for the DOM to be ready
	 $(document).ready(function(){
 		 
  		$("#login").validate({
      // Specify validation rules
        rules: {
          email: {
            required: true,
            email: true
          },

          password: {
            required: true,
            minlength: 8
          }
        },

        // Specify validation error messages
        messages: {
          email: "Please enter a valid email address",
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
          }
        },

      // in the "action" attribute of the form when valid
       submitHandler: function(form) {
          form.submit();
      }
  });
});

	</script>
</head>

<body >

<div class="container">
    <div class="wrapper">
        <form class="form-signin" name="login" id="login" method="post" action="<?php echo base_url('admin/login/index');?>">       
            <h2 class="form-signin-heading">Please Login</h2><br>
            
            <input type="email" class="form-control" name="email" placeholder="Email" />
            <span id="error" class="errorclass"></span>
            <br>

            <input type="password" class="form-control" name="password" placeholder="Password" />      
            <span id="error" class="errorclass"></span>
            <div class="border"> </div>

            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block"  value="Login">
      </form>
    <br>
<?php 
            if(isset($this->session->userdata['message']))
            {
?>
                <div class="alert alert-danger error_box">
                    <p><?php echo $this->session->userdata['message']; ?></p>
                </div>
<?php    
            }
?>
  </div>
</div>
</body>
</html>