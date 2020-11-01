<?php
    
    include("../DB/config.php");

    $day_name = date('d-m-Y');
    $bmeal_name = (isset($_POST["bmeal_name"])) ? $_POST["bmeal_name"]:"";
    $lmeal_name = (isset($_POST["lmeal_name"])) ? $_POST["lmeal_name"]:"";
    $dmeal_name = (isset($_POST["dmeal_name"])) ? $_POST["dmeal_name"]:"";
    $smeal_name = (isset($_POST["smeal_name"])) ? $_POST["smeal_name"]:"";
    $bmeal_price = (isset($_POST["bmeal_price"])) ? $_POST["bmeal_price"]:"";
    $lmeal_price = (isset($_POST["lmeal_price"])) ? $_POST["lmeal_price"]:"";
    $dmeal_price = (isset($_POST["dmeal_price"])) ? $_POST["dmeal_price"]:"";
    $smeal_price = (isset($_POST["smeal_price"])) ? $_POST["smeal_price"]:"";

    $image_dir = '../uploads/';

    $temp_file = array(
            "bimage" => $_FILES["bimage"]["tmp_name"],
            "limage" => $_FILES["limage"]["tmp_name"],
            "dimage" => $_FILES["dimage"]["tmp_name"],
            "simage" => $_FILES["simage"]["tmp_name"]
    );
    $filename = array(
            "bimage"=>$_FILES["bimage"]["name"],
            "limage"=>$_FILES["limage"]["name"],
            "dimage"=>$_FILES["dimage"]["name"],
            "simage"=>$_FILES["simage"]["name"]
    );
 
    $labels = ['bimage','limage','dimage','simage']; 

    $table_column = ['day_name','bmeal_name','bmeal_price','lmeal_name','lmeal_price','dmeal_name','dmeal_price','smeal_name','smeal_price','bimage','limage','dimage','simage'];
    
    $table_values = [$day_name,$bmeal_name,$bmeal_price,$lmeal_name,$lmeal_price,$dmeal_name,$dmeal_price,$smeal_name,$smeal_price,$filename["bimage"],$filename["limage"],$filename["dimage"],$filename["simage"]];
    $values = join("','",$table_values);


    $sql = "INSERT INTO dayspecial ".'('.implode(',',$table_column).')'."VALUES('$values')";
    if(mysqli_query($connect,$sql)){
         foreach($labels as $x){
            move_uploaded_file($temp_file[$x],$image_dir.basename($filename[$x]));
            
         }
         echo "<p class='text text-success'>Added Successfully</p>";
    }else{
        echo 'Problem in Insertion';
    }
?>