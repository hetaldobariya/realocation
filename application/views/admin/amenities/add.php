<script type="text/javascript">
  $(document).ready(function(){ 
		  $("#amenities").validate({
      
        rules: {
          	title: {
            	required: true
          	}
        },

        messages: {
         	title: {
            	required: "Please enter Title"
        	}
        },

        submitHandler: function(form) {
        form.submit();
      }
    });
  });
</script>
<div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>Add <small>Amenities Data</small></h1>
        <ol class="breadcrumb">
          <li><a  href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active"><i class="fa fa-edit"></i> amenities</li>
        </ol>
           
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-6">
        <form role="form" action="<?php echo base_url('admin/amenities/add'); ?>" method="post" 
        	id="amenities"> 

          <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="title">
           <!--  <p class="help-block">Example block-level help text here.</p> -->
          </div>

          <button type="submit" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default"  onclick="window.location='<?php echo base_url('admin/amenities/cancle'); ?>'">Cancle</button>  

        </form>
      </div>        
    </div><!-- /.row -->
</div>