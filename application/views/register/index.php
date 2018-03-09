<script type="text/javascript">

    $(document).ready(function(){    
        $("#register").validate({
      // Specify validation rules
        rules: {
            email: {
                required: true,
                email: true
            },
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            password: {
                required: true,
                minlength:8
            },
            confirm_password: {
                required: true,
                equalTo:"#password"
            }
        },

        // Specify validation error messages
        messages: {
            email: {
                required: "Please enter Email",
                email: "Please enter valid email"
            },
            first_name: {
                required: "Please enter first name"
            },
            last_name: {
                required: "Please enter last name"
            },
            password:{
                required: "Please enter password",               
                minlength:"Your password must be at least 8 characters long"
            },
            confirm_password: {
                required: "Please confirm your password",               
                equalTo:"Please enter the same password"       
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
                                    <h2 class="center">Register</h2>

                                    <div class="box">

                                        <form method="post"  id="register">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input class="form-control" type="email" name="email" required="required">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" name="first_name" required="required">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" type="text" name="last_name" required="required">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password" required="required" id="password"             maxlength="12">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input class="form-control" type="password" required="required" name="confirm_password">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <input value="Register" class="btn btn-primary btn-inversed btn-block" type="submit" id="submit" >
                                            </div><!-- /.form-group -->
                                        </form>
                                    </div><!-- /.box -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
</div>