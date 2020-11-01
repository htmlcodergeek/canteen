<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Panel</title>
    <link rel="stylesheet" href="../style/_style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body id="admin-id">
<div class="container">
           <a href="../admin/index.php" class="btn btn-warning">Login</a>
           <div class="admin-login">
              <h4>Registration Admin</h4>
              <form class="form-horizontal" method="POST" action="../admin/signup.php" autocomplete="off">
                  <div class="form-group row">
                      <label class="control-label col-sm-4">Name</label>
                      <div class="col-sm-7">
                          <input type="text" name="user" class="form-control" required/>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="control-label col-sm-4">password</label>
                      <div class="col-sm-7">
                          <input type="password" name="pass" class="form-control" required/>
                      </div>
                  </div>
                  <div class="form-group">
                        <input type="hidden" name="is_admin" value="1"/>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-4">Mobile Number</label>
                      <div class="col-sm-7">
                          <input type="number" name="mobile_number" class="form-control" required/>
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