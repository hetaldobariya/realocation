<script  src="<?php echo base_url(); ?>js/jquery.min.js"></script>
 <script  src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript">

		// validation rules example
    // Wait for the DOM to be ready
	$(document).ready(function(){
 		 
  		$("#add_actor").validate({
      // Specify validation rules
        rules: {
          	first_name: {
            	required: true,
          	},
	 		      last_name: {
	            required: true,  
	         }
        },

        // Specify validation error messages
        messages: {
         	first_name: {
            	required: "Please enter first name"
        	},
         	last_name: {
            	required: "Please enter last name"
          	}
        },

      // in the "action" attribute of the form when valid
       submitHandler: function(form) {
          form.submit();
      }
  });
});

	</script>
<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Add <small>Actor Data</small></h1>
            <ol class="breadcrumb">
              <li><a  href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> actors</li>
            </ol>
           
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

<?php 
            foreach ($gets as $single_actor) {
              
            }
?>
            <form role="form"  method="post" id ="add_actor"
            action="<?php echo base_url('admin/actors/update/'.$single_actor['id']); ?>" > 
              <div class="form-group">
                <label>First Name</label>
                <input class="form-control" type="text" name="first_name" 
                value="<?php echo $single_actor['firstname']; ?>" >
               <!--  <p class="help-block">Example block-level help text here.</p> -->
              </div>

               <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" type="text" name="last_name"
                value="<?php echo $single_actor['lastname']; ?>" >
               <!--  <p class="help-block">Example block-level help text here.</p> -->
              </div>

              <div class="form-group">
                <label>Gender</label>
                  <label class="radio-inline">
                    <input name="gender" value="F" <?php if($single_actor['gender'] == 'F') echo "checked='checked'" ?> type="radio">Female
                  </label>
                  <label class="radio-inline">
                    <input name="gender" value="M" <?php if($single_actor['gender'] == 'M') echo "checked='checked'" ?> type="radio"> Male
                  </label>               
              </div>

              <button type="submit" class="btn btn-default">Update</button>
              <button type="button" class="btn btn-default"  onclick="window.location='<?php echo base_url('admin/actors/index'); ?>'">Cancle</button>  

            </form>

          </div>
        
        </div><!-- /.row -->

      </div>