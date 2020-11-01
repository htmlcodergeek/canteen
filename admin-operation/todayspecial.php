<?php
   
   include("../DB/config.php");

   $date_today = date('d-m-Y');
   $sql = "SELECT * FROM dayspecial WHERE day_name='".$date_today."'";
   $res = mysqli_query($connect,$sql); 

   $bmeal = array();
   $bmeal_price = array();
   $bimage=array();

   $lmeal = array();
   $lmeal_price = array();
   $limage = array();

   $dmeal = array();
   $dmeal_price = array();
   $dimage = array();

   $smeal = array();
   $smeal_price = array();
   $simage = array();

   if(mysqli_num_rows($res)>0){
        while($rows = mysqli_fetch_assoc($res)){
                $bmeal[] = $rows["bmeal_name"];
                $bimage[] = $rows["bimage"];
                $bmeal_price[] = $rows["bmeal_price"];

                $lmeal[] = $rows["lmeal_name"];
                $limage[] = $rows["limage"];
                $lmeal_price[]= $rows["lmeal_price"];

                $dmeal[] = $rows["dmeal_name"];
                $dimage[] = $rows["dimage"];
                $dmeal_price[] = $rows["dmeal_price"];


                $smeal[] = $rows["smeal_name"];
                $simage[] = $rows["simage"];
                $smeal_price[]= $rows["smeal_price"];


        }
   }

  
   
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today Special</title>
    <link rel="stylesheet" href="style/_style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

.card-header {
    font-size:1.8rem;
    font-weight:bold;
    background:black;
    max-width:70%;
    color:whitesmoke;
    margin:0;
    padding:3px;
    display:block;
}
h3 {
     background-color:black;
     color:white;
     padding:2px;
}
  </style>
</head>
<body>
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://localhost/canteen/">Canteen Management System</a>
            </div>
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href="http://localhost/canteen/admin">Admin</a></li>
                <li class="active"><a href="http://localhost/canteen/users/signup.php">Users</a></li>

                <!-- <li><a href="users/checkout.php">checkout</a></li> -->

            
            </ul>
        </div>
    </nav>
    <div class="container">
    <?php if(!empty($smeal)){?>
           <div class="row">
               <h3>Today Special</h3>
               <?php for($i=0;$i<count($smeal);$i++){?>
                   <div class="col-sm-3"> 
                    <div class="card">
                        <div class="card-header"><?php echo $smeal[$i]?></div>
                        <div class="card-body">
                            <img src="../uploads/<?php echo $simage[$i]?>" width="180" height="180"/>
                        </div>
                         <div class="card-footer">
                         <span class="price" style="font-size:1.5rem;font-weight:bold;color:black;text-align:center;margin:0 auto;padding:5px;width:100%;display:block;background-color:white;">&#8377;&nbsp;<?php echo $smeal_price[$i]?></span>
                         <button class="btn btn-default cart"  style="text-align:center;margin:0 auto;width:68%;">ADD TO CART</button>
                         </div>
                        </div>
                    </div>
               <?php } ?>
           </div> 
         <?php } ?>
         <?php if(!empty($bmeal)){?>
           <div class="row">
               <h3>BreakFast</h3>
               <?php for($i=0;$i<count($bmeal);$i++){?>
                   <div class="col-sm-3"> 
                    <div class="card">
                        <div class="card-header"><?php echo $bmeal[$i]?></div>
                        <div class="card-body">
                            <img src="../uploads/<?php echo $bimage[$i]?>" width="180" height="180"/>
                        </div>
                        <div class="card-footer">
                        <span class="price" style="font-size:1.5rem;font-weight:bold;color:black;text-align:center;margin:0 auto;padding:5px;width:100%;display:block;background-color:white;">&#8377;&nbsp;<?php echo $bmeal_price[$i]?></span>
                         <button class="btn btn-default cart"  style="text-align:center;margin:0 auto;width:68%;">ADD TO CART</button>
                         </div>
                        </div>
                    </div>
               <?php } ?>
           </div> 
         <?php } ?>   
         <?php if(!empty($lmeal)){?>
           <div class="row">
               <h3>Lunch</h3>
               <?php for($i=0;$i<count($lmeal);$i++){?>
                   <div class="col-sm-3"> 
                    <div class="card">
                        <div class="card-header"><?php echo $lmeal[$i]?></div>
                        <div class="card-body">
                            <img src="../uploads/<?php echo $limage[$i]?>" width="180" height="180"/>
                        </div>
                        <div class="card-footer">
                        <span class="price" style="font-size:1.5rem;font-weight:bold;color:black;text-align:center;margin:0 auto;padding:5px;width:100%;display:block;background-color:white;">&#8377;&nbsp;<?php echo $lmeal_price[$i]?></span>
                         <button class="btn btn-default cart"  style="text-align:center;margin:0 auto;width:68%;">ADD TO CART</button>
                         </div>
                        </div>
                    </div>
               <?php } ?>
           </div> 
         <?php } ?> 
         <?php if(!empty($dmeal)){?>
           <div class="row">
               <h3>Dinner</h3>
               <?php for($i=0;$i<count($dmeal);$i++){?>
                   <div class="col-sm-3"> 
                    <div class="card">
                        <div class="card-header"><?php echo $dmeal[$i]?></div>
                        <div class="card-body">
                            <img src="../uploads/<?php echo $dimage[$i]?>" width="180" height="180"/>
                        </div>
                        <div class="card-footer">
                        <span class="price" style="font-size:1.5rem;font-weight:bold;color:black;text-align:center;margin:0 auto;padding:5px;width:100%;display:block;background-color:white;">&#8377;&nbsp;<?php echo $dmeal_price[$i]?></span>
                         <button class="btn btn-default cart"  style="text-align:center;margin:0 auto;width:68%;">ADD TO CART</button>
                         </div>
                        </div>
                    </div>
               <?php } ?>
           </div> 
         <?php } ?> 
         
         
    </div>
</body>
</html>