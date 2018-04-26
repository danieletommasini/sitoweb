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
<<<<<<< HEAD
    <div class="container">
    <div class="panel panel-default">
    <div class="panel-heading">List Of Posts</div>
    <form class="form" action="post.php"  method="POST">
    
=======
<!--_________________________________________________________________________________________________________________________________________________________________________________________-->

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">List Of Posts</div>
>>>>>>> bd6e48d1c691b1a31073638bd23956ad945728dc
    <?php
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "forum";
        
        try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("SELECT post.id_post, post.title, usernames.username FROM `post`
                                       INNER JOIN users ON post.email = users.email
                                       INNER JOIN usernames ON users.username = usernames.username
                                       WHERE post.category LIKE 'arduino'
                                       GROUP BY post.id_post DESC");
				$sql->execute();
                $result = $sql->fetchAll();
                for($i=0; $i < count($result); $i++){
                    echo '<div class="panel-body"><input class="btn" id="' . $result[$i]["id_post"] . '" value="' . $result[$i]["title"] . '" name="' . $result[$i]["id_post"] . '" type="submit"> <i style="color:black">by ' . $result[$i]["username"] . '</i></div>';
                }
        } catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
        }
    
    ?>
    </form>
  </div>
</div>



<?php

    if(isset($_SESSION["id"])){
        echo
        "<form action='postinsert.php' id='f1' method='post'>
            <div id='form'>

            <h1>Type here to add your post</h1>
            <input style='display: none' type='text' name='category' value='arduino' />
            <label for='title'>Title</label><input type='text' class='form-control' name='title' id='title' /><br>
            <label for='desc'>Description</label><input type='text' class='form-control' name='desc' id='desc' /><br>
            <label for='content'>Message</label><br>
            <textarea  name='textarea' id='msg' form='f1' class='form-control' cols='30' rows='10'>Type here ...</textarea>
            <br>
            <input type='submit' id='submit' class='btn btn-default' name='submit' value='Invia'/>
            </div>
        </form>";
    }
?>

</form>
   <script language=”javascript” src=”liveclock.js”></script> <body onLoad=”show_clock()”></script>



</body>
</html>