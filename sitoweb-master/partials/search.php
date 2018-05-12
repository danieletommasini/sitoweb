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
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">List Of Posts</div>
    
    <?php
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "forum";
        $q = $_COOKIE["text"];
        print_r($_COOKIE);
        
        try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("SELECT post.id_post, post.title, usernames.username FROM `post`
                                        INNER JOIN users ON post.email = users.email
                                        INNER JOIN usernames ON users.username = usernames.username
                                        WHERE post.title LIKE '%$q%' OR post.description LIKE '%$q%' OR post.content LIKE '%$q%'
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
</div>

</form>
   <script language=”javascript” src=”liveclock.js”></script> <body onLoad=”show_clock()”></script>
   <script>
       function link(el){
           document.cookie = "id_post=" + el.value;
           window.location.href = "/sitoweb/sitoweb-master/partials/post.php";
       }
   </script>



</body>
</html>