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


        <h1><p style="color : green">S</p><p>ource</p><p style="color:red">C</p><p>ode</p><p style="color:blue">Stack</p></h1><button style="position: absolute; right: 2%; top: 1%; border-radius: 1%"><a href="#">Login</a></button>
        
        
<nav class="navbar navbar-default">
  <div class="container-fluid" style="background-color: rgba(125,178,253,0.89);">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Homepage</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Arduino</a></li>
      <li><a href="#">C/C++</a></li>
      <li><a href="#">Java</a></li>
      <li><a href="#">Html</a></li>
      <li><a href="#">Css</a></li>
      <li><a href="#">JavaScript</a></li>
      <li><a href="#">Php</a></li>

    </ul>
  </div>
</nav>
  
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
    </body>
</html>