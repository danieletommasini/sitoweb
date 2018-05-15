<HTML>
    <?php require("partials/toolbar.php");?>
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
    <BODY>
        
         <?php
         session_start();
         $id = $_SESSION["id"];
        $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "forum";
        
        
        
        try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("SELECT users.email,users.username,users.password 
                                            FROM `users` 
                                            WHERE users.email 
                                            like '$id'");
				$sql->execute();
				$result = $sql->fetchAll();
				
				if(isset($_POST["passverify"])){
				    echo '<script>alert("HELLO");</script>';
                    if(password_verify($_POST["oldpass"], $result[0]["password"])){
                        echo '<script>alert("HELLO2");</script>';
                        if($_POST["oldpass"] != $_POST["newpass"] && $_POST["newpass"] == $_POST["newpassreply"]){ 
                            echo '<script>alert("HELLO3");</script>';
                            $newpwd = password_hash($_POST["newpass"], PASSWORD_DEFAULT);
                            $sql = $conn->prepare("UPDATE users 
                            SET users.password = '$newpwd'
                            WHERE users.email LIKE '$id'");
                            $sql->execute();
                            echo "$newpwd";
                            if(password_verify($_POST["newpass"], $result[0]["password"])){
                                echo '<script>alert("An error has occured!"); history.go(-1);</script>';
                            } else {
                                echo '<script>alert("Password successfully changed!"); history.go(-1);</script>';
                            }
                        }
                    }
                }
				
                for($i=0; $i < count($result); $i++){
                    echo '
                    
                    <div class="container>
                        <div class="panel panel-default" style="margin-left: 10px;margin-right: 10px; color: black"> <h2 style="margin-left: 10px;margin-right: 10px;">Dati Personali</h2>
                            <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">Username</i>: '. $result[$i]["username"] . '</div>
                            <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">email</i>: '. $result[$i]["email"] . '</div>
                        </div>
                        <div class="panel panel-default" style="margin-left: 10px;margin-right: 10px; color: black"> <h3 style="margin-left: 10px;margin-right: 10px;">Change Password</h3>
                            <form action="account.php" method="post">   
                                <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">Old Password </i><input type="password" name="oldpass"></div>
                                <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">New Password </i><input type="password" name="newpass"></div>
                                <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">Reply Password </i><input type="password" name="newpassreply"></div>
                                <input type="submit" name="passverify" value="Verify Password"  class="btn btn-info" style="margin-bottom: 1%;margin-left: 4%; border-radius:5px">
                            </form>
                        </div>
                    </div>
                    ';
                }
        } catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
        }
    
    ?>

</div>
        
        
    
    
</script>
    </BODY>
</HTML>