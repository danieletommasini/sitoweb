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

<button type="button" class="btn btn-success btn-lg" style="position: absolute; right: 2%; top: 1%;z-index:10; padding: 5px 16px;" data-toggle="modal" data-target="#myModal">Login</button>

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
        <p>
          
            <?php
    session_start();
    if(!isset($_SESSION["id"])){
      include "login.php";
    } else {
      echo $_SESSION["id"] . " <form class='form' action='loginregister.php' method='post'>
            <input type='submit' name='logout' value='LOGOUT'><br><br> 
            </form>";
    }
  ?>
  
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>


        
<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="#"><p style="color : green; ">S</p><p style="color:red;font-family:‘Courier New’, Courier, monospace">C</p><p style="color:blue;font-family:‘Courier New’, Courier, monospace">S</p></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Arduino</a></li>
      <li><a href="partials/cpp.php">C/C++</a></li>
      <li><a href="#">Java</a></li>
      <li><a href="#">Html</a></li>
      <li><a href="#">Css</a></li>
      <li><a href="#">JavaScript</a></li>
      <li><a href="#">Php</a></li>


    </ul>
  </div>
</nav>
  

    </body>
</html>