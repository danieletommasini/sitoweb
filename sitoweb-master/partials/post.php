<!DOCTYPE html>
<html>
<?php require("toolbar.php");session_start();?>

  <style>
body {
    color: #fff;
}
 
#form {
    background: #5f5f5f;
    width:90%;
    margin: 50px auto;
    padding: 25px;
    overflow: hidden;
 
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    border-radius: 20px;
}
 
h1 {
    font-family: Verdana, sans-serif;
    color: #FF8100;
    margin-bottom: 20px;
}

    
  </style>
<body>


        <form action='postinsert.php' id='f1' method='post'>
            <div id='form'>

            
            <h2>Title</h2><br>
            <i>descriptione</i><br><br>
            <p>content<p>
            <textarea  name='textarea' id='msg' form='f1' class='form-control' cols='30' rows='10'>Type here ...</textarea>
            <br>
            <input type='submit' id='submit' class='btn btn-default' name='submit' value='ADD COMMIT'/>
            </div>
        </form>

</body>
</html>