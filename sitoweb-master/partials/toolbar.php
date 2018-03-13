<!DOCTYPE html>
<html>
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">
  
  	
  </head>
    <body style="background-color: #80808036;">

<!--<div class="container">-->
       <!-- <h1><p style="color : green">S</p><p>ource</p><p style="color:red">C</p><p>ode</p><p style="color:blue">Stack</p></h1>-->
     <!-- GIOVANNI FALCONE <a href="#" class="btn btn-default" data-toggle="popover" data-placement="bottom" style="position: absolute; right: 2%; top: 1%;z-index:10;" data-content="Contentrtert">Login </a>-->
    <!--   <button class="btn btn-default" style="position: absolute; right: 2%; top: 1%;z-index:10;">Login</button>-->

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>


        
<nav class="navbar navbar-inverse navbar-static-top" >
  <div class="container-fluid">
<!--    <a class="w3-bar-item w3-button w3-hover-white w3-padding-16 hidesm" href="javascript:void(0)" onclick="w3_open()"><i class="fa">X</i></a>-->
    <div class="navbar-header">
   <a class="navbar-brand" href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/"><p style="font-family:Impact, Charcoal, sans-serif">Scs</p></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/arduino.php">Arduino</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/cpp.php">C/C++</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/java.php">Java</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/html.php">Html</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/css.php">Css</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/javascript.php">JavaScript</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/php.php">Php</a></li>
     <!-- <li>  <div class="input-group">
        <input type="text" class="form-control" placeholder="Search ..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div></li>
-->

    </ul>
<div class="navbar-right" style="margin-right: 0px">
<button type="button" class="btn btn-success btn-lg navbar-btn" style=" right: 8%; top: 1%;z-index:10; padding: 3px 12px;" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login/Registered</h4>
      </div>
      <div class="modal-body">
      
          
  <?php
    session_start();
    if(!isset($_SESSION["id"])){
     include "/home/ubuntu/workspace/sitoweb/sitoweb-master/login.php";
    } else {
      echo $_SESSION["id"] . " <form class='form' action='loginregister.php' method='post'>
            <input type='submit' name='logout' value='LOGOUT'><br><br> 
            </form>";
    }
  ?>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- ___________________________________________________-->

<button type="button" class="btn btn-success btn-lg navbar-btn" style=" right: 1%; top: 1%;z-index:10; padding: 3px 12px;" data-toggle="modal" data-target="#signin"><span class="glyphicon glyphicon-user"></span> Sing In</button>

<!-- Modal -->
<div id="signin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SignIn</h4>
      </div>
    <div class="modal-body">
  <?php
    session_start();
    if(!isset($_SESSION["id"])){
    include"/home/ubuntu/workspace/sitoweb/sitoweb-master/signin.php";
    } else {
      echo $_SESSION["id"] . " <form class='form' action='loginregister.php' method='post'>
            <input type='submit' name='logout' value='LOGOUT'><br><br> 
            </form>";
    }
  ?>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>


</div>
</nav>
  

    </body>
</html>