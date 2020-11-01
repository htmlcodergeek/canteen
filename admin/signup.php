<?php
    require_once("../DB/config.php");
    if(isset($_POST["submit"])){
        $name = htmlspecialchars($_POST['user']);
        $password = $_POST["pass"];
        $is_admin =(!empty($_POST["is_admin"]))? $_POST["is_admin"]:0;
        $is_user = (!empty($_POST["is_user"]))? $_POST["is_user"]:0;
        $contact = $_POST["mobile_number"];

        $table_column = ['is_admin','is_user','name','password','mobile_number'];
        $table_values = [$is_admin,$is_user,$name,trim($password),$contact];
        $join_values = join("','",$table_values);
        
        $sql = "INSERT INTO users ".'('.implode(',',$table_column).')'."VALUES('$join_values')";
    
        if(mysqli_query($connect,$sql)){
            header("Location:../admin/index.php?message='success'");
            exit();
        }
      }
?>
