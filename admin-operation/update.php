<?php
    include("../DB/config.php");

    $meal_id = $_POST["meal_id"];

    $meal_name = $_POST["meal_name"];

    $meal_type = $_POST["meal_type"];

    $update = "UPDATE meals SET meal_name='".$meal_name."', meal_type ='".$meal_type."' where meal_id=".$meal_id."";
    $res = mysqli_query($connect,$update);
    

?>