<br/>
<li class="breadcrumb" style="width:20%;">Special item</li>
<br/>
<div id="message"></div>
<div class="panel panel-primary">
    <div class="panel-heading">Today Special</div>
    <div class="panel-body">
        <form class="form-horizontal" autocomplete="off" id="meal_package" enctype="multipart/form-data">
               <div class="row">
                <div class="col-sm-4">
                    <div class="form-group row">
                        <label class="control-label col-sm-4">Breakfast</label>
                    </div>
                    <div class="form-group row">
                       <label class="control-label col-sm-2">Name</label>     
                       <div class="col-sm-8">
                           <input type="text" name="bmeal_name" class="form-control"/>
                       </div> 
                    </div>
                    <div class="form-group row">
                       <label class="control-label col-sm-2">Price</label>     
                       <div class="col-sm-8">
                           <input type="text" name="bmeal_price" class="form-control"/>
                       </div> 
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-sm-2">Image</label>      
                      <div class="col-sm-8">
                            <input type="file" name="bimage" class="form-control" onchange="preview_image(this)"/>
                      </div>  
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8" style="text-align:center;left:20%;">
                                <img id="preview_img" width="180" height="180"/>
                        </div>
                    </div>
                </div>  
                <div class="col-sm-4">
                    <div class="form-group row">
                         <label class="control-label col-sm-4">Lunch</label>
                    </div>
                    <div class="form-group row">
                       <label class="control-label col-sm-2">Name</label>     
                       <div class="col-sm-8">
                           <input type="text" name="lmeal_name" class="form-control"/>
                       </div> 
                    </div>
                    <div class="form-group row">
                       <label class="control-label col-sm-2">Price</label>     
                       <div class="col-sm-8">
                           <input type="text" name="lmeal_price" class="form-control"/>
                       </div> 
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-sm-2">Image</label>      
                      <div class="col-sm-8">
                            <input type="file" name="limage" class="form-control" onchange="lpreview_image(this)"/>
                      </div>  
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8" style="text-align:center;left:20%;">
                                <img id="lpreview_img" width="180" height="180"/>
                        </div>
                    </div>
                </div>   

                <div class="col-sm-4">
                    <div class="form-group row">
                         <label class="control-label col-sm-4">Dinner</label>
                    </div>
                    <div class="form-group row">
                       <label class="control-label col-sm-2">Name</label>     
                       <div class="col-sm-8">
                           <input type="text" name="dmeal_name" class="form-control"/>
                       </div> 
                    </div>
                    <div class="form-group row">
                       <label class="control-label col-sm-2">Price</label>     
                       <div class="col-sm-8">
                           <input type="text" name="dmeal_price" class="form-control"/>
                       </div> 
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-sm-2">Image</label>      
                      <div class="col-sm-8">
                            <input type="file" name="dimage" class="form-control" onchange="dpreview_image(this)"/>
                      </div>  
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8" style="text-align:center;left:20%;">
                                <img id="dpreview_img" width="180" height="180"/>
                        </div>
                    </div>
                </div> 
               </div>
               <div class='row'>
                   <div class="col-sm-4">
                   <div class="form-group row">
                         <label class="control-label col-sm-6">Special Dish</label>
                    </div>
                    <div class="form-group row">
                       <label class="control-label col-sm-2">Name</label>     
                       <div class="col-sm-8">
                           <input type="text" name="smeal_name" class="form-control"/>
                       </div> 
                    </div>
                    <div class="form-group row">
                       <label class="control-label col-sm-2">Price</label>     
                       <div class="col-sm-8">
                           <input type="text" name="smeal_price" class="form-control"/>
                       </div> 
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-sm-2">Image</label>      
                      <div class="col-sm-8">
                            <input type="file" name="simage" class="form-control" onchange="spreview_image(this)"/>
                      </div>  
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8" style="text-align:center;left:20%;">
                                <img id="spreview_img" width="180" height="180"/>
                        </div>
                    </div>
                   </div>
               </div>
               <div class="form-group row">
                   <input type="submit" name="submit" class="btn btn-danger" value="special" id="package"/> 

                </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#package').on('click',function(e){
                e.preventDefault();
                var form = $('form')[0]; 
                var formData = new FormData(form);
                $.ajax({
                     url:'../admin-operation/meal.php',
                     method:'POST',
                     contentType: false,
                       processData: false,
                     data:formData,
                     success:function(data){
                         $('#message').html(data);
                     }   
                });

        });

       
    });
    function preview_image(input){
        
        $('#preview_img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }

    function lpreview_image(input){
        
        $('#lpreview_img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }

    function dpreview_image(input){
        
        $('#dpreview_img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
    function spreview_image(input){
        
        $('#spreview_img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }

</script>