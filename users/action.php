<?php
    session_start();
    $cart_id = $_POST["cart_id"];

    if(isset($_SESSION['shopping_cart'])){
        foreach($_SESSION["shopping_cart"] as $key=>$values){
              if($values["price"] == $cart_id){
                   unset($_SESSION['shopping_cart'][$key]);
              }
        }
        
    }

?>