<!DOCTYPE html>
<html>
<?php require("toolbar.php");?>
<body>
  <style>
    body {
    background-color: #000;
    color: #fff;
    font-family: Verdana, sans-serif;
    font-size: 14px;
}
 
#form {
    background: #5f5f5f;
    width: 500px;
    margin: 50px auto;
    padding: 25px;
    overflow: hidden;
 
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    border-radius: 20px;
}
 
h1 {
    font-family: Verdana, sans-serif;
    font-size: 16px;
    color: #ff7070;
    margin-bottom: 20px;
}

  </style>
  
   <form action="postinsert.php" id="f1" method="post">
  <div id="form">

    <h1>Scrivi qui per aggiungere il tuo post</h1>
    <input style="display: none" type="text" name="category" value="cpp" />
    <label for="title">title</label><input type="text" class="form-control" name="title" id="title" /><br>
    <label for="desc">descfgn</label><input type="text" class="form-control" name="desc" id="desc" /><br>
    <label for="content">Messaggio</label><br>
    <textarea  name="textarea" id="msg" form="f1" class="form-control" cols="30" rows="10">write here ...</textarea>
 
    <input type="submit" id="submit" class="btn btn-default" name="submit" value="Invia"/>
  </div>

<?php




?>

</form>
   <script language=”javascript” src=”liveclock.js”></script> <body onLoad=”show_clock()”>



</body>
<?php require("/home/ubuntu/wor/sitoweb/sitoweb-master/partials/pager.php");?>
</html>