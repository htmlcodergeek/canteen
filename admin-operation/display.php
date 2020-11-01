<?php
    include("../DB/config.php");

    $fetch = "SELECT * FROM meals where current_year = ".date('Y')."";
    $res = mysqli_query($connect, $fetch);
    
    $breakfast = array();
    $lunch     = array();
    $dinner    = array();
    
    
    if(mysqli_num_rows($res)>0){
        while($rows = mysqli_fetch_assoc($res)){
               if($rows["meal_type"] == 'b' ){
                    $breakfast[] = $rows;
               }else if($rows["meal_type"] == 'l'){
                    $lunch[] = $rows;
               }else{
                    $dinner[] = $rows;
               }

        }

    }else{
         echo '<p>No Lists To Show</p>';
    }

if(count($breakfast)>0){?>

    <!--BREAKFAST-->
    <h4 id="banner">BREAKFAST</h4>
    <div class="container">
        <div class="row">
        <?php
             
            foreach($breakfast as $rows){ ?>
                <div class="card col-sm-2">
                    
                    <div class="card-header"><?php echo $rows["meal_name"]?></div>
                    <div class="card-body">
                            <img src="../uploads/<?php echo $rows["image_name"]?>" width="180" height="180"/>
                            <div class="overlay">
                                <a href="#" class="modal-links" data-value="<?php echo $rows["meal_id"]?>" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                <a href="#" class="del-links" data-value="<?php echo $rows["meal_id"]?>" data-toggle="modal" data-target="#DeleteModal"><i class="fas fa-trash-alt"></i></a>
                            </div>
                    </div>
                </div>
                
            <?php }
        ?>
        </div>
    </div>

<?php }

if(count($lunch)>0){?>
   <!--LUNCH-->
   <h4 id="banner">LUNCH</h4>  
    <div class="container">
    <div class="row">
        <?php
             
            foreach($lunch as $rows){ ?>
                <div class="card col-sm-2">
                    <div class="card-header"><?php echo $rows["meal_name"]?></div>
                    <div class="card-body">
                            <img src="../uploads/<?php echo $rows["image_name"]?>" width="180" height="180"/>
                            <div class="overlay">
                                <a href="#" class="modal-links" data-value="<?php echo $rows["meal_id"]?>" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                                <a href="#" class="del-links" data-value="<?php echo $rows["meal_id"]?>" data-toggle="modal" data-target="#DeleteModal"><i class="fas fa-trash-alt"></i></a>
                            </div>
                    </div>
                </div>
            <?php }
        ?>
        </div>
    </div>

<?php }

if(count($dinner)>0){?>
    <!--DINNER-->
    <h4 id="banner">DINNER</h4>
    <div class="container">
    <div class="row">
        <?php
             
            foreach($dinner as $rows){ ?>
                <div class="card col-sm-2">
                    <div class="card-header"><?php echo $rows["meal_name"]?></div>
                    <div class="card-body">
                            <img src="../uploads/<?php echo $rows["image_name"]?>" width="180" height="180"/>
                            <div class="overlay">
                            <a href="#" class="modal-links" data-value="<?php echo $rows["meal_id"]?>" data-toggle="modal" data-target="#EditModal"><i class="fas fa-edit"></i></a>
                            <a href="#" class="del-links" data-value="<?php echo $rows["meal_id"]?>" data-toggle="modal" data-target="#DeleteModal"><i class="fas fa-trash-alt"></i></a>
                            </div>
                    </div>
                </div>
            <?php }
        ?>
        </div>
    </div>
<?php }
?>

<div id="EditModal" class="modal fade" role="dialog">
</div> 

<div id="DeleteModal" class="modal fade" role="dialog">
</div> 
<script>
    $(document).ready(function(){
        $(".modal-links").on('click',function(e){
                e.preventDefault();
                var id = $(this).attr("data-value");
                $.ajax({
                    url:'../admin-operation/editmeal.php',
                    method:'POST',
                    data:{"id":id},
                    success:function(data){

                         $("#EditModal").html(data);
                    }
                });
        }); 

        $(".del-links").on('click',function(e){
                e.preventDefault();
                var id = $(this).attr("data-value");
                $.ajax({
                    url:'../admin-operation/deletemeal.php',
                    method:'POST',
                    data:{"del_id":id},
                    success:function(data){
                       $('#DeleteModal').html(data);
                       $('#DeleteModal').modal('hide');
                        location.reload();
                    }
                })
        });
    });
</script>

