<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php

		session_start();
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "databoat";

		if(isset($_POST["logout"])){
    		session_unset();
    		session_destroy();
    		echo "Successfully logged out!<br>";
    		echo "<a href='index.php'>Do you want to login?</a>";
    	}

		if(array_key_exists('username', $_POST) && array_key_exists('password', $_POST)){
			try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    			if(isset($_POST["register"])){
    				$username = $_POST["username"];
					$sql = $conn->prepare("SELECT username FROM login WHERE username LIKE '$username'");
					$sql->execute();
                	$result = $sql->fetchAll();
					
					$i = 0;
					while($i < count($result) && $_POST["username"] != $result[$i]["username"]){
						$i++;	
					}

					if($i == count($result)){
						$sql = $conn->prepare("INSERT INTO login (username, password) VALUES (:username, :password)");
                		$sql->bindParam(':username', $username);
                		$sql->bindParam(':password', $password);

                		$username = $_POST["username"];
                		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    					$sql->execute();
    					echo "You have been successfully registered<br>";
    					echo "<a href='index.php'>Do you want to login?</a>";
    				} else {
    					echo "Username already taken";
    				}
    			}

    			if(isset($_POST["login"])){
    				$username = $_POST["username"];
					$sql = $conn->prepare("SELECT username, password FROM login WHERE username LIKE '$username'");
					$sql->execute();
                	$result = $sql->fetchAll();

    				$i = 0;
					while($i < count($result) && $_POST["username"] != $result[$i]["username"]){
						$i++;	
					}
					if($i != count($result)){
						if(password_verify($_POST["password"], $result[$i]["password"])){
							$_SESSION["id"] = $username;
							echo "Successfully logged in!<br>";
							echo "<a href='form.php'>Do you want to return at the form page?</a>";
						} else {
							echo "Incorrect password!";
						}
    				} else {
    					echo "Username not valid!";
    				}
				}
			} catch(PDOException $e) {
    			echo "Connection failed: " . $e->getMessage();
    		}
    		$conn = null;	
   		}
        
	?>	

</body>
</html>