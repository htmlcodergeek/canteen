<?php
   include("../DB/config.php");
   
   $del_id = $_POST["del_id"];
   $search = "SELECT * from meals where meal_id = ".$del_id."";
   $res = mysqli_query($connect, $search);
   
   while($rows = mysqli_fetch_assoc($res)){
        $image_name = $rows["image_name"];

   }
    
   $del = "DELETE from meals WHERE meal_id=".$del_id."";
   if(mysqli_query($connect, $del)){?>
       
       <div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Message</h4>
  </div>
  <div class="modal-body">
    <p class="text text-danger">Product Deleted Successfully</p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>  
        
  <?php  
   unlink("../uploads/".$image_name);  
}
   ?>







