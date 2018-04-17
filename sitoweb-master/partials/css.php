<!DOCTYPE html>
<html>
<?php require("toolbar.php");?>
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
    <?php


    session_start();

    if(isset($_SESSION["id"])){
        echo
        "<form action='postinsert.php' id='f1' method='post'>
            <div id='form'>

            <h1>Type here to add your post</h1>
            <input style='display: none' type='text' name='category' value='css' />
            <label for='title'>Title</label><input type='text' class='form-control' name='title' id='title' /><br>
            <label for='desc'>Description</label><input type='text' class='form-control' name='desc' id='desc' /><br>
            <label for='content'>Message</label><br>
            <textarea  name='textarea' id='msg' form='f1' class='form-control' cols='30' rows='10'>Type here ...</textarea>
 
            <input type='submit' id='submit' class='btn btn-default' name='submit' value='Invia'/>
            </div>
        </form>";
    }
?> 
</body>
</html>