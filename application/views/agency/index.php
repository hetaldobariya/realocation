<script type="text/javascript">

    $(document).ready(function(){    
        $("#agency").validate({
      // Specify validation rules
        rules: {
            title: {
                required: true
            },
            description: {
                required: true
            },
            address: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            website: {
                required: true,
                url: true
            },
            mobile_no: {
                required: true,
                digits: true,
                minlength:10
            },
            profile_photo: {
                required: true,
                accept: "image/*"
            },
            password:{
                required: true,
                minlength:8
            }
        },

        // Specify validation error messages
        messages: {
            title: {
                required: "Please enter title"
            },
            description: {
                required: "Please enter description"
            },
            address: {
                required: "Please enter address"
            },
            email: {
                required: "Please enter Email",
                email: "Please enter valid email"
            },
            website: {
                required: "Please enter website",
                url: "please enter propare url"
            },
            mobile_no: {
                required: "Please enter mobile_no",
                digits: "Please enter only digits",
                minlength: "Please enter 10 digits number"
            },
            profile_photo:{
                required: "Please select your profile photo",               
                accept:"Please select only image file"
            },
            password:{
                required: "Please select your profile photo",
                minlength: "Please enter 8 character"
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
                            <h2 class="center">Create Agency</h2>

                            <form method="post" id="agency" enctype="multipart/form-data">
                                <div class="box">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="6" name="description"></textarea>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="address">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" name="email">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Website</label>
                                        <input class="form-control" type="text" name="website">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" name="mobile_no" maxlength="10">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Profile Photo</label>
                                        <input class="form-control" type="file" name="profile_photo">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" maxlength="12">
                                    </div><!-- /.form-group -->

                                </div><!-- /.box -->
                            
                                <div class="form-group center">
                                    <input value="Create Agency" class="btn btn-inversed btn-primary" type="submit">
                                </div><!-- /.form-group -->
                            </form>
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div>