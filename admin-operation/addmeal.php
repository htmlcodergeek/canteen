<?php
    include("../DB/config.php");
     
    $image_dir = '../uploads/';

    $destination = $image_dir . basename($_FILES["image_file"]["name"]);

    $meal_name = $_POST["meal_name"];
    $meal_type = $_POST["meal_type"];
    $price    = $_POST["price"];

    if($_FILES["image_file"]["error"] == 0 ){
        $filename = $_FILES["image_file"]["name"];
        $type     = $_FILES["image_file"]["type"];
        $store_file = $_FILES["image_file"]["tmp_name"];


    }

    $table_columns = ['meal_type','meal_name','price','image_name','current_year'];
    $table_values  = [$meal_type, $meal_name,$price,$filename,date("Y")];
    $values = join("','",$table_values);

    $sql = "INSERT INTO meals ".'('.implode(',',$table_columns).')'."VALUES('$values')";
    if(mysqli_query($connect,$sql)){
         move_uploaded_file($store_file,$destination);
         echo "<p class='text text-success'>Added Successfully</p>";
    }else{
        echo "problem in Insertion";
    }



?>