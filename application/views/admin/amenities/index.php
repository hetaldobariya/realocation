<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() { 
      $('.editbox').hide();
      $(".edit_tr").live('click', function()
      {
          var ID=$(this).attr('id');

          $("#one_"+ID).hide();
          $("#one_input_"+ID).show();
          $(".editbox").live("mouseup", function(e) {
                e.stopImmediatePropagation();
            });
          
          $(document).mouseup(function() {
              $(".editbox").hide();
              $(".text").show();
          });

      }).live('change',function(e)
        {
          var ID=$(this).attr('id');

          var name=$("#one_input_"+ID).val();
          
          if(name.length>0 )
          {
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('admin/amenities/edit') ?>",
              data: {id:ID,title:name},
              
              success: function(e)
              {
                $("#one_"+ID).html(name);             
                
                e.stopImmediatePropagation();
              }
            });
          }
          else
          {
            alert('Enter something.');
          }
        });
        
      });
  </script>
<?php 
if($this->session->flashdata('message'))
{
     echo $this->session->flashdata('message'); 
}
$this->session->set_userdata('referred_from', current_url());
?>
<div class="col-lg-12">
    <h2>Amenities</h2>

    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-table"></i> amenities</li>
    </ol>

    <form action="<?php echo base_url('admin/amenities/index'); ?>" method="post">
      <div class="table-responsive">
         <div class="box-tools m-b-15">
            <div class="input-group">
                <a href="<?php  echo base_url('admin/amenities/add'); ?>" class="btn btn-primary">Add New</a>
                <input type="submit" name="multiple_delete" value="Delete All" class="btn btn-danger" onclick="return confirm('Are You Sura To Delete Those Records')">
                <input type="text" name="search_box" class="form-control input-sm pull-right" 
                style="width: 150px;" placeholder="Search" 
                value="<?php if(!empty($searching_name)){ echo $searching_name; } ?>"
                 />

                <div class="input-group-btn">
                  <!-- <button type="submit" class="btn btn-sm btn-default" name="search"><i class="fa fa-search"></i></button> -->
                   <button type="submit" class="btn btn-default"  name="search">search</button>  
                </div>
            </div>
            <br>
          </div>
<?php 
          if($amenities == false)
          {
?>
            <div class="alert alert-danger">
                No Record Exist. 
            </div>
<?php 
          }
          else
          {
?>
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all"/></th>
                  <th>Sr. No <i class="fa fa-sort"></i></th>
                  <th>Title<i class="fa fa-sort"></i></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php 
          $no = $this->uri->segment(5); 
          foreach ($amenities as $amenitie) 
          {
?>                      
             <tr class="edit_tr" id="<?php echo $amenitie['id'] ?>">
                <td>
                    <input type="checkbox" name="multi_delete[]" 
                    value="<?php echo $amenitie['id']; ?>" class="checkbox">
                </td>
                <td><?php echo $no=$no+1; ?></td>

                <td class='edit_td' id="<?php echo $amenitie['id'] ?>" >
                  <span id='one_<?php echo $amenitie['id']; ?>' class='text'>
                    <?php echo $amenitie['title']; ?></span>
                  <input type='text' value='<?php echo $amenitie['title']; ?>' class='editbox form-control' id='one_input_<?php echo $amenitie['id'];?>' />    
                </td>
                <td><a href="<?php echo base_url('admin/amenities/delete/'.$amenitie['id']); ?>">Delete</a> 
                </td>
              </tr>
<?php 
          }// end of foreach
?>                      
            </tbody>
          </table>                  
          <ul class="pagination pagination-lg" style="padding-left: 700px;">
             <li> <?php echo $links; ?></li>
          </ul>        
<?php  
        }//end of if
?>                   
      </div>
    </form>   
  </div>
</div><!-- /.row -->
           