<br/>
<li class="breadcrumb" style="width:20%;">Add</li>
<br/>
<div id="message"></div>
<div class="panel panel-primary">
    <div class="panel-heading">Add Item</div>
    <div class="panel-body">
        <form class="form-horizontal" autocomplete="off" id="meal_frm" enctype="multipart/form-data">
             <div class="form-group row">
                 <label class="control-label col-sm-4">Select Meal Type</label>
                 <div class="col-sm-8">
                     <select class="form-control" name="meal_type" id="meal_type">
                           <option value="">SELECT MEAL TYPE</option>
                           <option value="b">BREAKFAST</option> 
                           <option value="l">LUNCH</option> 
                           <option value="d">DINNER</option>
                     </select>
                 </div>
             </div>
             <div class="form-group row">
                 <label class="control-label col-sm-4">Meal name</label>
                 <div class="col-sm-8">
                     <input type="text" name="meal_name" class="form-control" id="meal_name" />
                 </div>
             </div>
             <div class="form-group row">
                 <label class="control-label col-sm-4">Image</label>
                 <div class="col-sm-8">
                     <input type="file" name="image_file" class="form-control" id="image_file" onchange="preview_image(this)"/>
                 </div>
             </div>
             <div class="form-group row">
                <label class="control-label col-sm-4">Price</label>
                <div class="col-sm-8">
                    <input type="number" name="price" class="form-control" id="price"/>
                </div>
             </div>
             <div class="form-group row">
                 <div class="col-sm-8" style="text-align:center;left:20%;">
                        <img id="preview_img" width="180" height="180"/>
                 </div>
             </div>
             <div class="form-group" style="text-align:center;">
                 <input type="submit" name="submit" class="btn btn-danger" value="ADD" id="add"/>
             </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#add').on('click',function(e){
                e.preventDefault();
                var ispassed = true;
                var meal_type = $('#meal_type').val();
                var meal_name = $('#meal_name').val();
                var image_file = $('#image_file').val();
                var price      = $('#price').val();
                var data = {'meal_type':meal_type,'meal_name':meal_name,'image_file':image_file};

                if( meal_type.length == 0 || meal_name.length == 0 || image_file.length == 0 || price.length == 0){
                      ispassed = false;
                      alert("Please Enter All the Fields");
                }
 
               if(ispassed){
                var form = $('form')[0]; 
                var formData = new FormData(form);
                   $.ajax({
                       url:'../admin-operation/addmeal.php',
                       method:'POST',
                       contentType: false,
                       processData: false,
                       data:formData,
                       success:function(data){
                         
                            $("#message").html(data);
                            $('#message').fadeIn().delay(1000).fadeOut();
                            $('form')[0].reset();
                            $('#preview_img')[0].src='';
                       }
                   })
               }

        });

       
    });
    function preview_image(input){
        $('#preview_img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        
    }

</script>