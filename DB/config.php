<?php
    define('HOST','localhost');
    define('PASSWORD','');
    define('DBNAME','canteen');
    define('USERNAME','root');


    $connect = '';

    $connect = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
    
    if($connect){
         return $connect;
    }else{
         echo "Problem in connection".mysqli_error($connect);
    }
?>