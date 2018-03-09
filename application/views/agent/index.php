<script type="text/javascript">

    $(document).ready(function(){    
        $("#agent_register").validate({
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
            password:{
                required: true,
                minlength:8
            },
            skype_name: {
                required: true
            },
            profile_photo: {
                required: true,
                accept: "image/*"
            },
            post: {
                required: true
            },
            status: {
                required: true             
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
            password: {
                required: "Please enter your password",
                minlength: "Please enter 8 character"
            },
            skype_name: {
                required: "Please enter skype name"
            },
            profile_photo:{
                required: "Please select your profile photo",               
                accept:"Please select only image file"
            },
            post: {
                required: "Please enter post"
            },
            status: {
                required: "Please enter status" 
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
                                <h2 class="center">Create Agent</h2>

                                <div class="box">

                                    <form method="post"  id="agent_register" 
                                    enctype="multipart/form-data">
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
                                            <input class="form-control" type="password" name="password" required="required" id="password"  maxlength="12">
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Skype Name</label>
                                            <input class="form-control" type="text" name="skype_name" required="required">
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Status</label>
                                            <input class="form-control" type="file" name="profile_photo" required="required">
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Post</label>
                                            <input class="form-control" type="text" name="post" required="required">
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option>Select Status</option> 
                                                <option value="elite">Elite</option>
                                                <option value="retired">Retired</option> 
                                            </select>
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