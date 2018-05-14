<!DOCTYPE html>
<html>
<?php require("toolbar.php");?>

  <style>
body {
    color: #fff;
}
 
#form {
    background: #d4d4d4;
    width:100%;
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
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">List Of Posts</div>
    
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
                                       WHERE post.category LIKE 'javascript'
                                       GROUP BY post.id_post DESC");
				$sql->execute();
                $result = $sql->fetchAll();
                for($i=0; $i < count($result); $i++){
                    echo '<div class="panel-body"><button class="btn" id="' . $result[$i]["id_post"] . '" value="' . $result[$i]["id_post"] . '"' . ' onclick="link(this)">' . $result[$i]["title"] . '</button> <i style="color:black">by ' . $result[$i]["username"] . '</i></div>';
                }
        } catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
        }
    
    ?>
  </div>




<?php

    if(isset($_SESSION["id"])){
        echo
        "<form action='postinsert.php' id='f1' method='post' autocomplete='off'>
            <div id='form' style='margin-right: 0; margin-left: 0;'>

            <h1 style='color:#337ab7'>Type here to add your post</h1>
            <input style='display: none' type='text' name='category' value='javascript' />
            <label for='title' style='color:black'>Title</label><input type='text' class='form-control' name='title' id='title' /><br>
            <label for='desc' style='color:black'>Description</label><input type='text' class='form-control' name='desc' id='desc' /><br>
            <label for='content' style='color:black'>Code</label><br>
            <textarea  name='textarea' id='msg' form='f1' class='form-control' cols='30' rows='10' placeholder='Paste your code here...'></textarea>
            <br>
            <input type='submit' id='submit' class='btn btn-primary' name='submit' value='Send'/>
            </div>
        </form>";
    }
?>

</div>
   <script language=”javascript” src=”liveclock.js”></script> <body onLoad=”show_clock()”></script>
   <script>
       function link(el){
           document.cookie = "id_post=" + el.value;
           window.location.href = "/sitoweb/sitoweb-master/partials/post.php";
       }
   </script>



</body>
</html>