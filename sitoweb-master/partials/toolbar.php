<!DOCTYPE html>
<html>
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="/sitoweb/sitoweb-master/style.css" rel="stylesheet" type="text/css">


  
  	
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

<style>
  
  .modal-backdrop.fade.in{
    z-index:-1;
    
  }

  .affix {
      top: 0;
      width: 100%;
      z-index:9999;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  </style>
  


        
<nav class="navbar navbar-inverse navbar-static-top " data-spy="affix" data-offset-top="197" style="z-index: unset;position:sticky">
  <div class="container-fluid">
<!--    <a class="w3-bar-item w3-button w3-hover-white w3-padding-16 hidesm" href="javascript:void(0)" onclick="w3_open()"><i class="fa">X</i></a>-->
    <div class="navbar-header">
    <a class="navbar-brand" href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/"><p style="font-family:Impact, Charcoal, sans-serif">Scs</p></a>

    </div>
    <ul id="content1" class="nav navbar-nav" >
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/arduino.php">Arduino</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/cpp.php">C/C++</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/java.php">Java</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/html.php">Html</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/css.php">Css</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/javascript.php">JavaScript</a></li>
      <li><a href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/php.php">Php</a></li>
         <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
     <!-- <li>  <div class="input-group">
        <input type="text" class="form-control" placeholder="Search ..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div></li>

     <button type="button" class="btn btn-default btn-sm navbar-brand" style="background-color:#9d9d9d00" >
          <span class="glyphicon glyphicon-list"></span> 
        </button>
-->
    </ul>

    
    
    
    
<?php
  session_start();
  if(!isset($_SESSION["id"])){
    
echo "<div class='navbar-right' style='margin-right: 0px'>
<button type='button' class='btn btn-success btn-lg navbar-btn' style=' right: 8%; top: 1%;z-index:10; padding: 3px 12px;' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-log-in'></span> Log In</button>

<!-- Modal -->
<div id='myModal' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Log In</h4>
      </div>
      <div class='modal-body'>";
      
   
     include "/home/ubuntu/workspace/sitoweb/sitoweb-master/login.php";
    
    echo "
    </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>

<!-- ___________________________________________________-->

<button type='button' class='btn btn-success btn-lg navbar-btn' style=' right: 1%; top: 1%;z-index:10; padding: 3px 12px;' data-toggle='modal' data-target='#signin'><span class='glyphicon glyphicon-user'></span> Sing In</button>

<!-- Modal -->
<div id='signin' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Sign In</h4>
      </div>
    <div class='modal-body'>";
    
    include"/home/ubuntu/workspace/sitoweb/sitoweb-master/signin.php";
    
    echo " 
    </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>

</div>";
} else {
      echo "
      <div class='navbar-right' style='margin-right: 0px'>  
        <ul class='nav navbar-nav'> 
         <li class='dropdown'>
           <a class='dropdown-toggle' data-toggle='dropdown' href='#'>" . $_SESSION["username"] . "<span class='caret'></span></a>
           <ul class='dropdown-menu'>
              <li><a href='/sitoweb/sitoweb-master/account.php'><div style='text-align:center'>Settings</div></a></li>
              <li><div style='text-align:center'><form class='form' action='/sitoweb/sitoweb-master/loginregister.php' method='post'>
                  <input class='navbar-btn' type='submit' name='logout' value='LOGOUT'> 
              </form></div></li>
           </ul>
          </li>
        </ul>
      </div>";
}
?>







</div>
</nav>

<!--
<script>
  if(screen.height>900){
    getElementById("nav-bar1")
  }
  
  
</script>-->


  <!--<form class='form' action='/sitoweb/sitoweb-master/loginregister.php' method='post'>
      <input class='navbar-btn' type='submit' name='logout' value='LOGOUT'><br><br> 
  </form>-->


    </body>
</html>