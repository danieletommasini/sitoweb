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
    width: 500px;
    margin: 50px auto;
    background: #222;
    padding: 25px;
    overflow: hidden;
 
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    border-radius: 20px;
}
 
h1 {
    font-size: 16px;
    color: #FCCC69;
    margin-bottom: 20px;
}
  </style>
  
   <form action="#">
  <div id="form">
    <h1>Scrivi qui per aggiungere il tuo post</h1>
    <label for="title">title</label><input type="text" class="form-control" name="title" id="title" /><br>
     <label for="desc">descfgn</label><input type="text" class="form-control" name="desc" id="desc" /><br>
    <label for="content">Messaggio</label><br>
    <textarea name="messaggio" id="messaggio" class="form-control" cols="30" rows="10"></textarea>
 
    <input type="submit" id="submit" class="btn btn-default" name="submit" value="Invia" onclick="push()"/>
  </div>

<?php

?>

</form>
   

</body>
<?php require("/home/ubuntu/workspace/sitoweb/sitoweb-master/partials/pager.php");?>
</html>