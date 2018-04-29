<!DOCTYPE html>
<html>
<?php
    require("toolbar.php");
    session_start();
?>

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
        $id_post = $_COOKIE["id_post"];
       
        $servername = "localhost";
	    $username = "root";
	    $password = "";
        $dbname = "forum";
        
        try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("SELECT post.title, post.description, post.content FROM `post`
                                       WHERE post.id_post LIKE '$id_post'");
				$sql->execute();
                $result = $sql->fetchAll();
                
                $title = htmlentities($result[0]["title"]);
                $description = htmlentities($result[0]["description"]);
                $content = htmlentities($result[0]["content"]);
        

            echo "<form action='commentinsert.php' id='f1' method='post' autocomplete='off'>
                <div id='form'>
                    
                <h2> $title </h2><br>
                <i> $description </i><br><br>
                <p> $content<p>";
                
                $sql = $conn->prepare("SELECT comments.content, usernames.username FROM `comments`
                                       INNER JOIN users ON comments.email = users.email
                                       INNER JOIN usernames ON users.username = usernames.username
                                       WHERE comments.id_post LIKE '$id_post'");
                $sql->execute();
                $result = $sql->fetchAll();
                echo "<div class='container'>
                        <div class='panel panel-default'>";
                            foreach($result as $i => $value){    
                                $content = htmlentities($result[$i]["content"]);
                                $username = htmlentities($result[$i]["username"]);
                                echo "</span>$content</span><i> by $username</i><br>";
                            }
                echo "  </div>
                      </div>";
            if(isset($_SESSION["id"])){
                echo "<textarea  name='textarea' id='msg' form='f1' class='form-control' cols='30' rows='10' placeholder='Type here...'></textarea>
                <br>
                <input type='submit' id='submit' class='btn btn-default' name='submit' value='ADD COMMENT'/>";
            }
            
        } catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
        }
    ?>
        </div>
    </form>

</body>
</html>