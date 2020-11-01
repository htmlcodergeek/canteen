<?php
include("../DB/config.php");

$id = $_POST["id"];

$search = "SELECT * from meals where meal_id = ".$id."";
$res = mysqli_query($connect, $search);

$meal_type = '';
if(mysqli_num_rows($res)>0){
    while($rows = mysqli_fetch_assoc($res)){
        if($rows["meal_type"] == 'b'){
            $meal_type = "BREAKFAST";
        }else if($rows["meal_type"] == 'l'){
            $meal_type = "LUNCH";
        }else{
             $meal_type = "DINNER";
        }?>

<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" style="text-transform:uppercase;font-weight:bold;"><?php echo $rows["meal_name"]?></h4>
  </div>
  <div class="modal-body">
  <form class="form-horizontal" autocomplete="off" id="meal_frm">
             <div class="form-group row">
                 <label class="control-label col-sm-4">Select Meal Type</label>
                 <div class="col-sm-8">
                     <select class="form-control" name="meal_type" id="meal_type">
                           <option value="">SELECT MEAL TYPE</option>
                           <option value="b" <?php echo ($rows["meal_type"] == 'b') ? "selected":""?>>BREAKFAST</option> 
                           <option value="l" <?php echo ($rows["meal_type"] == 'l') ? "selected":""?>>LUNCH</option> 
                           <option value="d" <?php echo ($rows["meal_type"] == 'd') ? "selected":""?>>DINNER</option> 
                     </select>
                 </div>
             </div>
             <div class="form-group row">
                 <label class="control-label col-sm-4">Meal name</label>
                 <div class="col-sm-8">
                     <input type="text" name="meal_name" class="form-control" id="meal_name" value="<?php echo $rows["meal_name"]?>" />
                 </div>
             </div>
             <div class="form-group row">
                 <div class="col-sm-8" style="text-align:center;left:20%;">
                        <img src="<?php echo "../uploads/".$rows["image_name"]?>" id="preview_img" width="180" height="180"/>
                 </div>
             </div>
             <div class="form-group">
                <input type="hidden" name="meal_id" value="<?php echo $rows["meal_id"]?>"/>
             </div>
             <div class="form-group" style="text-align:center;">
                 <input type="submit" name="submit" class="btn btn-danger" value="UPDATE" id="update"/>
             </div>
        </form>
  </div>
</div>

   <?php  }
}

?>

<script>
  $(document).ready(function(){
     $('#update').on('click',function(e){
          e.preventDefault();
          var form = $('form')[0]; 
          var formData = new FormData(form);
          $.ajax({
              url:'../admin-operation/update.php',
              method:'POST',
              data:formData,
              contentType: false,
              processData: false,
              success:function(data){
                $('#EditModal').modal('hide');
                location.reload();
              }
          });
     });
  });
</script>