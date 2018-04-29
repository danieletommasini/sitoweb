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
        } catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
        }
    ?>

    <form action='postinsert.php' id='f1' method='post'>
        <div id='form'>
            
        <h2><?php echo "$title"; ?></h2><br>
        <i><?php echo "$description"; ?></i><br><br>
        <p><?php echo "$content"; ?><p>
        <?php
        
        if(isset($_SESSION["id"])){
            echo "<textarea  name='textarea' id='msg' form='f1' class='form-control' cols='30' rows='10' placeholder='Type here...'></textarea>
            <br>
            <input type='submit' id='submit' class='btn btn-default' name='submit' value='ADD COMMENT'/>";
        }
        
        ?>
        </div>
    </form>

</body>
</html>