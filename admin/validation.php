<?php
  include("../DB/config.php");  
   


  if(isset($_POST["submit"])){
      if(!empty($_POST["user"]) && !empty($_POST["pass"])){
           $name = $_POST["user"];
           $password = $_POST["pass"];
           $is_admin ='';
           $is_user ='';
            
           $user = get_user_details($name, $password);

           if(is_array($user)){
                session_start();
                $_SESSION['user'] = $user;
                if($user["is_admin"] == 1){
                    header("location:../admin/dashboard.php");
                }else{
                    header("location:../users/dashboard.php");
                }
           }else{
                header("location:../admin/index.php?error=$user");
           }
           
          
      }
  }

  function get_user_details($name, $password){
    global $connect;
    $search_query = "SELECT * FROM users WHERE name='".$name."' AND password = '".$password."' LIMIT 0,1";
    $res = mysqli_query($connect,$search_query);
    $user_details = [];
    if(mysqli_num_rows($res)>0){
       
       while($rows = mysqli_fetch_assoc($res)){
              $user_details = array(
                      "username" => $rows["name"],
                      "is_admin" => $rows["is_admin"],
                      "is_user"  => $rows["is_user"],
                      "is_logged" => true
              );
       }
       return $user_details;   

    }else{
        return "Incorrect Details";
    }
}
  

?>