<HTML>
    <?php require("partials/toolbar.php");?>
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
                for($i=0; $i < count($result); $i++){
                    echo '       
                    <div class="panel panel-default" style="margin-left: 10px;margin-right: 10px;"> <h2 style="margin-left: 10px;margin-right: 10px;">Dati Personali</h2>
                    <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">Username </i>:'.$result[$i]["username"].'</div>
                    <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">email </i>:'.$result[$i]["email"].'</div>
                    <div class="panel panel-default" style="margin-left: 10px;margin-right: 10px;"> <h3 style="margin-left: 10px;margin-right: 10px;">Change Password</h3>
                    <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">Old Password </i><input type="text" id="oldpass"></div>
                    <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">New Password </i><input type="text" id="newpass"></div>
                    <div class="panel-body" style="margin-left: 10px;margin-right: 10px;"><i style="color:#6ea4c5">Reply Password </i><input type="text" id="newpassreply"></div>
                    <button class="btn-info" style="margin-bottom: 1%;margin-left: 4%; border-radius:5px onclick"VerifyPass()">Verify Password</button>
                    ';
                }
        } catch(PDOException $e) {
    		echo "Connection failed: " . $e->getMessage();
        }
    
    ?>

</div>
<script>
    function VerifyPass(){
        if(password_verify($_POST["password"], $result[$i]["password"])){
            
            
        }
        
        
    }
    
</script>
    </BODY>
</HTML>