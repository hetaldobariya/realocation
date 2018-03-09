<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.wallform.js"></script>
<script type="text/javascript">

$(document).ready(function(){  

        $("#country").change(function()
        {
            var id = $(this).val();
            $.ajax
            ({
                type: "POST",
                url: "<?php echo base_url('property/state'); ?>",
                data: {id:id,},
                success: function(html)
                {
                    $(".state").html(html);
                   //alert(html);
                    
                }
            });
        });

        $(".state").change(function()
        {
            var id = $(this).val();
            $.ajax
            ({
                type: "POST",
                url: "<?php echo base_url('property/city'); ?>",
                data: {id:id,},
                success: function(html)
                {
                   $(".city").html(html);
                    //alert(html);
                    
                }
            });
        });  
        $("#property").validate({
      // Specify validation rules
        rules: {
            title: {
                required: true
            },
            price: {
                required: true,
                digits:true
            },
            description: {
                required: true
            },
            baths: {
                required: true,
                digits:true
            },
            beds: {
                required: true,
               digits:true
            },
            area: {
                required: true,
                digits:true
            },
            garages: {
                required: true,
                digits:true
            },
            photos: {
                required: true,
                accepts:'images/*'
            },
            facebook_url: {
                required: true,
                url:true
            }

        },

        // Specify validation error messages
        messages: {
            title: {
                required: "Please enter title"
            },
            price: {
                required: "Please enter price",
                digits:"please enter only digits"
            },
            description: {
                required: "Please enter description"
            },
            baths: {
                required: "Please enter baths",
                digits:"please enter only digits"
            },
            beds: {
                required: "Please enter beds",
               digits:"please enter only digits"
            },
            area: {
                required: "Please enter area",
                digits:"please enter only digits"
            },
            garages: {
                required: "Please enter garages",
                digits:"please enter only digits"
            },
            photos: {
                required: "Please select photos ",
                accepts:'Please select only images'
            },
            facebook_url: {
                required: "Please enter facebook url ",
                url:"Please enter valid url"
            }
        },

      // in the "action" attribute of the form when valid
       submitHandler: function(form) {
          form.submit();
      }
    });

    $('#photoimg').die('click').live('change', function()           
    { 
        $("#property").ajaxForm({target: '#preview', 
            beforeSubmit:function()
            { 
                console.log('v');
                $("#imageloadstatus").show();
                $("#imageloadbutton").hide();
            }, 

            success:function()
            { 
                console.log('z');
                $("#imageloadstatus").hide();
                $("#imageloadbutton").show();
            }, 
                
            error:function()
            { 
                console.log('d');
                $("#imageloadstatus").hide();
                $("#imageloadbutton").show();
            }
        }).submit();
    });


});

  
</script>
<div id="main-wrapper">
    <div id="main">
        <div id="main-inner">
            <div class="container">
                <div class="block-content block-content-small-padding">
                    <div class="block-content-inner">
                        <h2 class="center">Submit Property</h2>

                        <form method="post" id="property" enctype="multipart/form-data" action="<?php echo base_url('property/index'); ?>">
                            <div class="box">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="title">
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" type="text" name="price">
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="6" name="description"></textarea>
                                </div><!-- /.form-group -->

                                <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" type="text" name="type">
                                            <option>Select Type</option>
                                            <option value="apertment">Apartment</option>
                                            <option value="building_area">Building Area</option>
                                            <option value="condo">Condo</option>
                                            <option value="house">House</option>
                                            <option value="villa">Villa</option>
                                        </select>
                                </div><!-- /.form-group -->

                            </div><!-- /.box -->

                            <div class="row">
                                <div class="col-sm-4">
                                    <h3>Other Details</h3>
                                    <div class="box">
                                        <div class="form-group">
                                        <label>Baths</label>
                                        <input class="form-control" type="text" name="baths">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Beds</label>
                                        <input class="form-control" type="text" name="beds">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Area</label>
                                        <input class="form-control" type="text" name="area">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Garages</label>
                                        <input class="form-control" type="text" name="garages">
                                    </div><!-- /.form-group -->

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <h3>Location</h3>

                                    <div class="box">
                                        <div class="form-group">
                                            <label>Country</label>

                                            <div class="select-wrapper">
                                                <select id="country" class="form-control country" name="country">
                                                    <option value="0">Select Country</option>
<?php                                               foreach ($countries as $country) 
                                                    {
?>                                                      <option value="<?php echo $country['id'];                                                     ?>"><?php echo $country['name']; ?></option>    
<?php 
                                                    }
?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>State</label>

                                            <div class="select-wrapper">
                                                <select  class="form-control state" name="state" >
                                                    <option value="0">Select state</option> 

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Sublocation</label>

                                            <div class="select-wrapper">
                                                <select  class="form-control city"
                                                    name="city">
                                                    <option value="0">Select City</option>    
                                                 </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0">Select Status</option>
                                                <option value="rent">Rent</option>
                                                <option value="sale">Sale</option>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <h3>Photos</h3>

                                    <div class="box">
                                       <div style="background:white;height:245px;" id="preview"></div>
                                       <div class="form-group" style="padding-left: 88px;margin-top: 26px;">
                                        <input type="file" name="photos[]" multiple="multiple" id="photoimg">
                                    </div><!-- /.form-group -->
                                    </div><!-- /.box -->
                                    
                                </div><!-- /.col-sm-3 -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>URLs</h3>
                                    <div class="box">
                                        <div class="form-group">
                                            <label>Facebook URL</label>
                                            <input class="form-control" type="text" 
                                            name="facebook_url">
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Twitter URL</label>
                                            <input class="form-control" type="text" name="twitter_url">
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Linkin URL</label>
                                            <input class="form-control" type="text" name="linkin_url">
                                        </div><!-- /.form-group -->

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="box" style="margin-top: 51px">

                                        <div class="form-group">
                                            <label>Google Plus URL</label>
                                            <input class="form-control" type="text" name="googleplus_url">
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Vimeo URL</label>
                                            <input class="form-control" type="text" name="vimeo_url">
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Youtube URL</label>
                                            <input class="form-control" type="text" name="youtube_url">
                                        </div><!-- /.form-group -->

                                    </div>
                                </div>
                            </div>


                            <h3>Amenities</h3>

                            <div class="box clearfix">
                                <ul class="submit-property-list list-unstyled">
<?php                              foreach ($amenities as $amenitie) 
                                   {
?>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox" value="<?php echo $amenitie['id'] ?>" name="amenities[]"><?php echo $amenitie['title']; ?></label></li>
<?php
                                   }
?>                                      
                                </ul>
                            </div><!-- /.box -->

                            <div class="form-group center">
                                <input value="Submit Property" class="btn btn-inversed btn-primary" type="submit">
                            </div><!-- /.form-group -->
                        </form>
                    </div><!-- /.block-content-inner -->
                </div><!-- /.block-content -->
            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
</div>