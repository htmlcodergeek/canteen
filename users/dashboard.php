<?php
    session_start();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/admin.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/2a5fa16cd0.js" crossorigin="anonymous"></script>
</head>
<body style="max-width:100%;overflow-x:hidden;">
    <nav class="navbar navbar-inverse"style="border:0;padding:0;left:0;border-radius:0;margin:0;">
    <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href="../admin/logout.php">welcome <?php echo $_SESSION["user"]["username"]?></a></li>
            </ul>
        </div>
    </nav> 
    <div class="row">
        <!--DISP[LAY]-->
 <?php
    include("../DB/config.php");

    $fetch = "SELECT * FROM meals where current_year = ".date('Y')."";
    $res = mysqli_query($connect, $fetch);
    
    $total_food = array();
    
    if(mysqli_num_rows($res)>0){
        while($rows = mysqli_fetch_assoc($res)){
               $total_food[] = $rows;

        }

    }else{
         echo '<p>No Lists To Show</p>';
    }

if(count($total_food)>0){?>
        <div class="container">
        <div id="paymessage"></div>
        <div id="cart-fetch"></div>
            <div class="row">
            <?php foreach($total_food as $items){?>
                <div class="card col-sm-2">
                    <div class="card-header" style="text-align:center;text-transform:uppercase;background-color:#ecf0f1;width:100%;display:block;padding:5px;"><?php echo $items["meal_name"]?></div>
                    <div class="card-body">
                    <img src="../uploads/<?php echo $items["image_name"]?>" width="200" height="200"/>
                    </div>
                    <div class="card-footer">
                        <span class="price" style="font-size:1.5rem;font-weight:bold;color:black;text-align:center;margin:0 auto;padding:5px;width:100%;display:block;background-color:white;">&#8377;&nbsp;<?php echo $items["price"]?></span>
                        <button class="btn btn-default cart" data-price ="<?php echo $items["price"]?>" data-name = "<?php echo $items["meal_name"]?>" style="text-align:center;margin:0 auto;width:100%;">ADD TO CART</button>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>


<?php }?>  


    </div> 

    
   
 <script>
    $(document).ready(function(){
    

        $('.cart').on('click',function(e){
              e.preventDefault();
              var price = $(this).attr("data-price");
              var meal_name = $(this).attr("data-name");
              $.ajax({
                    url:'../users/checkout.php',
                    method:'POST',
                    data:{"price":price,"meal_name":meal_name},
                    success:function(data){
                         $('#cart-fetch').html(data);
                        
                    }
              });
             
        });

        

        

       
    });
 </script>
</body>
</html>