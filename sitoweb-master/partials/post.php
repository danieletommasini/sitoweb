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
    background:#5f5f5f17;
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
                    
                <strong style='color:#bd5c00; font-family:Courier new; font-size: 36px'> $title </strong>
                <br>
                <i style='color:black;font-family:Courier new; font-size: 20px'> $description </i>
                <br><br>";
                if($content != "") echo "<pre class='prettyprint linenums' style='color:black'>$content</pre>";
            echo "<div class='panel-heading'></div>";
                ;
                
                $sql = $conn->prepare("SELECT comments.content, comments.code, usernames.username FROM `comments`
                                       INNER JOIN users ON comments.email = users.email
                                       INNER JOIN usernames ON users.username = usernames.username
                                       WHERE comments.id_post LIKE '$id_post'");
                $sql->execute();
                $result = $sql->fetchAll();
                echo "<div class='container'style='width: 100%;'>
                        <div class='panel panel-default'>";
                            foreach($result as $i => $value){    
                                $content = htmlentities($result[$i]["content"]);
                                $username = htmlentities($result[$i]["username"]);
                                $code = htmlentities($result[$i]["code"]);
                                echo "<div class='panel-body' style='padding: 7px;'><i s style='color:#6194da'>Comment by $username</i>
                                <br>";
                                if($content != ""){
                                    echo "<span style='color:black;font-family:Courier new; font-size: 16px'>$content</span>
                                    <br>";
                                }
                                if($code != ""){
                                    echo "<pre class='prettyprint linenums' style='color:black'>$code</pre>
                                    <br>";
                                }    
                                echo "<hr style='margin-bottom:-8px;'></div>";
                            }
                echo "  </div>
                      </div>";
            if(isset($_SESSION["id"])){
                echo "<textarea name='content' form='f1' class='form-control' cols='30' rows='4' placeholder='Type here...'></textarea>
                <br>
                <textarea name='code' form='f1' class='form-control' cols='30' rows='4' placeholder='Paste your code here...'></textarea>
                <br>
                <input type='submit' id='submit' class='btn btn-primary' name='submit' value='ADD COMMENT'/>";
            }
            
        } catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
        }
    ?>
        </div>
    </form>

</body>
</html>