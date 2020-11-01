<?php
session_start();
include("../DB/config.php");
    
     $user =  $_SESSION['user']['username'];
     $meal_name = array();
     $price  = array();
     $total = '';
     if(isset($_POST["meal_name"])){
            for($i=0;$i<count($_POST["meal_name"])-1;$i++){
                 $meal_name[] = $_POST["meal_name"][$i];
            }
     }

     if(isset($_POST["price"])){
           $total = $_POST["price"][count($_POST["price"])-1]; 
          for($i=0;$i<count($_POST["price"])-1;$i++){
               $price[] = $_POST["price"][$i];
          }
     }

     $table_columns = ['payee','status','date'];
     $table_values = [$user,"paid",date('d-m-Y')];
     $values = join("','",$table_values);
     $sql = "INSERT INTO payment ".'('.implode(',',$table_columns).')'."VALUES('$values')";

     if(mysqli_query($connect,$sql)){
          echo '<p class="text text-success">Payment processed</p>';
     }
      unset($_SESSION['shopping_cart']);
      
    
?>