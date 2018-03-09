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
          email: {
             required: "Please enter email",
            email: "Please ener valid email"
          },
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
<div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <h2 class="center">Login</h2>

                                    <div class="box">
                                        <form method="post" id="login">
                                            <div class="form-group">
                                                <label>Login</label>
                                                <input class="form-control" type="email" name="email">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <input value="Login" class="btn btn-primary btn-inversed btn-block" type="submit">
                                            </div><!-- /.form-group -->
                                        </form>
<?php 
                                        if(isset($this->session->userdata['message']))
                                        {
?>                                           <div class="alert alert-danger error_box">
                                                <p><?php echo $this->session->userdata['message']; ?></p>
                                            </div>
<?php                                   }
?>
                                    </div><!-- /.box -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div>
