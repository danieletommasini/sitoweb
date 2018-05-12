<!DOCTYPE html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <link href="/sitoweb/sitoweb-master/style.css" rel="stylesheet" type="text/css">
  </head>
    <body style="background-color: #80808036;">


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
  


<nav class="navbar navbar-inverse navbar-static-top" data-spy="affix" data-offset-top="197" style="z-index: unset;position:sticky">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/index.php"><p style="font-family:Impact, Charcoal, sans-serif">ScS</p></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/sitoweb/sitoweb-master/partials/arduino.php">Arduino</a></li>
        <li><a href="/sitoweb/sitoweb-master/partials/cpp.php">C/C++</a></li>
        <li><a href="/sitoweb/sitoweb-master/partials/java.php">Java</a></li>
        <li><a href="/sitoweb/sitoweb-master/partials/html.php">Html</a></li>
        <li><a href="/sitoweb/sitoweb-master/partials/css.php">Css</a></li>
        <li><a href="/sitoweb/sitoweb-master/partials/javascript.php">JavaScript</a></li>
        <li><a href="/sitoweb/sitoweb-master/partials/php.php">Php</a></li>
        
          <div class="form-group navbar-form navbar-left">
            <input id="text" type="text" class="form-control" placeholder="Search" name="search" autocomplete="off">
            <button class="btn btn-default" onclick="search()">Submit</button>
          </div>
          
          
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
          
            session_start();
            if(!isset($_SESSION["id"])){
              
          echo "
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
          
          ";
          } else {
                echo "
                <div class='navbar-right' style='margin-right: 0px'>  
                  <ul class='nav navbar-nav'> 
                   <li class='dropdown'>
                     <a class='dropdown-toggle' data-toggle='dropdown' href='#'>" . $_SESSION["username"] . "<span class='caret'></span></a>
                     <ul class='dropdown-menu'>
                        <li><a href='/sitoweb/sitoweb-master/account.php'><div style='text-align:center'>Settings</div></a></li>
                        <li><div style='text-align:center'><form class='form' action='/sitoweb/sitoweb-master/loginregister.php' method='post'>
                            <input class='btn btn-primary' type='submit' name='logout' value='LOGOUT'> 
                        </form></div></li>
                     </ul>
                    </li>
                  </ul>
                </div>";
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
<script>
       function search(){
          document.cookie = "text=" + document.getElementById("text").value + "; path=/;";
          window.location.href = "https://lamp-project-danieletommasini.c9users.io/sitoweb/sitoweb-master/partials/search.php";
       }
   </script>
</body>