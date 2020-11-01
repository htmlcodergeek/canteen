<?php
    session_start(); 
    if(isset($_POST["price"]) && isset($_POST["meal_name"])){
        $price = $_POST["price"];
        $meal_name = $_POST["meal_name"];
    
        $_SESSION['shopping_cart'][] =array(
                "price" =>$price,
                "meal_name"=>$meal_name
        );
    }
     $button ='';
     $link = '';
     $class = '';
    if(isset($_SESSION['user']['is_logged'])){
         if($_SESSION['user']['is_logged'] == 1){
              $button = 'PAY';
              $link = 'http://localhost/canteen/users/pay.php';
              $class = 'btn btn-primary pay';
         }else{
              $button = 'REGISTER';
              $link ='http://localhost/canteen/users/signup.php';
              $class = 'btn btn-primary ';
         }
    }else{
        $button = 'REGISTER';
        $link ='http://localhost/canteen/users/signup.php';
        $class = 'btn btn-primary ';
    }
   

     $sum = 0;
     $value = 0;
    if(isset($_POST["cart_id"])){
        $value = 1; 
        $cart_id = $_POST["cart_id"];
        if(isset($_SESSION['shopping_cart'])){
            foreach($_SESSION["shopping_cart"] as $key=>$values){
                  if($values["price"] == $cart_id){
                       unset($_SESSION['shopping_cart'][$key]);
                  }
            }
            
        }
    } 

   
 ?>

 
<?php  if(isset($_SESSION['shopping_cart'])){?>
<table class="table table-stripped" id="payment">
    <thead>
        <th>MEAL NAME</th>
        <th>PRICE</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
             
            
                 if(!empty($_SESSION['shopping_cart'])){
                     foreach($_SESSION['shopping_cart'] as $key=>$values){?>
                           <tr>
                                <td><?php echo $values["meal_name"]?></td>
                                <td><?php $sum = $sum + $values["price"];echo $values["price"]?></td>
                                <td class="text text-danger"><a class="remove btn btn-danger" data-price="<?php echo $values["price"]?>">remove</a></td>
                           </tr>         
                    <?php }
                    echo '<tr><td style="text-align:end;">Total</td><td>'.$sum.'</td><td><a href='.$link.' class="'.$class.'" style="display:block;width:20%;">'.$button.'</a></td></tr>';   
                 }else{?>
                     <tr>
                        <td colspan="10">Empty Cart</td>
                     </tr>   
                 <?php }
            
           
        ?>
           
        
    </tbody>
</table> 
                 <?php } ?>

<script>
  $(document).ready(function(){
    $('.remove').on('click',function(e){
        e.preventDefault();
             var data = $(this).attr("data-price"); 
            

             $.ajax({
                    url:'<?php echo $_SERVER["PHP_SELF"]?>',
                    method:'POST',
                    data:{"cart_id":data},
                    success:function(data){
                       $('#cart-fetch').html(data);
                    }
             });
             $(this).closest('tr').remove();

        });

        $('.pay').on('click',function(e){
                e.preventDefault();
                var meal = [];
                    var pr = []; 
                $('#payment > tbody > tr ').each(function(index,tr){
                    var tds = $(this).find('td');
                    var meal_name = tds.eq(0).text();
                    meal.push(meal_name);
                    var price = tds.eq(1).text();
                    pr.push(price);

                    
                });
                $.ajax({
                        url:'../users/pay.php',
                        method:"POST",
                        data:{"meal_name":meal,"price":pr},
                        success:function(data){
                            //  console.log(data);
                             $('#paymessage').html(data);
                            
                             location.reload();
                             
                             
                        }
                    });
        });
  });
</script>

