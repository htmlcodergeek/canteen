<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/admin.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/2a5fa16cd0.js" crossorigin="anonymous"></script>
</head>
<body style="max-width:100%;overflow-x:hidden;">
    <nav class="navbar navbar-inverse"style="border:0;padding:0;left:0;border-radius:0;margin:0;">
    <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href="../admin/logout.php">welcome <?php echo $_SESSION["user"]["username"]?></a></li>
            </ul>
        </div>
    </nav> 
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3" id="sidebar">
            <ul class="sidebar-list">
                <li><a href="../admin-operation/add.php" class="links">ADD ITEM</a></li>
                <li><a href="../admin-operation/display.php" class="links">DISPLAY</a></li>
                <li><a href="../admin-operation/special.php" class="links">SPECIAL ITEM</a></li>
            </ul>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8" id="main-content">

        </div>

    </div> 

    <script>
        $('document').ready(function(){
            $('.links').on('click',function(e){
                    e.preventDefault();
                    $('#main-content').load($(this).attr("href"));
            });
        });  

    </script>
</body>
</html>