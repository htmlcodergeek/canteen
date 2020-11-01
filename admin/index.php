<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen Managment System</title>
    <link rel="stylesheet" href="../style/_style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body id="admin-id">
     <div class="container">
           <a href="../admin/registration.php" class="btn btn-warning">Registration</a>
            <?php
                if(isset($_GET["message"])){?>
                      <h3>Your Registration is <?php echo $_GET["message"]?></h3>  
                <?php }
            ?>
            <?php
                if(isset($_GET["error"])){?>
                    <h3 style="color:#ffffff;"><?php echo $_GET["error"]?></h3>
                <?php } 
            ?>
           <div class="admin-login">
              <form class="form-horizontal" method="post" action="../admin/validation.php" autocomplete="off">
                  <div class="form-group row">
                      <label class="control-label col-sm-3">username</label>
                      <div class="col-sm-7">
                          <input type="text" name="user" class="form-control"/>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="control-label col-sm-3">password</label>
                      <div class="col-sm-7">
                          <input type="password" name="pass" class="form-control"/>
                      </div>
                  </div>
                  <div class="col-sm-10">
                      <input type="submit" name="submit" value="login" class="btn btn-primary"/>
                  </div>
              </form>
           </div> 
     </div>
</body>
</html>