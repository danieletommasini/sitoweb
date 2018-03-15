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
		$dbname = "forum";

		if(isset($_POST["logout"])){
    		session_unset();
    		session_destroy();
    		echo "Successfully logged out!<br>";
    		echo "<a href='index.php'>Do you want to login?</a>";
    	}

		if(array_key_exists('email', $_POST) && array_key_exists('password', $_POST)){
			try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    			if(isset($_POST["register"])){
    				$email = $_POST["email"];
					$sql = $conn->prepare("SELECT email FROM users WHERE email LIKE '$email'");
					$sql->execute();
                	$result = $sql->fetchAll();
					
					$i = 0;
					while($i < count($result) && $_POST["email"] != $result[$i]["email"]){
						$i++;	
					}

					if($i == count($result)){
						$username = $_POST["username"];
						$sql = $conn->prepare("SELECT username FROM usernames WHERE username LIKE '$username'");
						$sql->execute();
                		$result = $sql->fetchAll();
					
						$j = 0;
						while($j < count($result) && $_POST["username"] != $result[$j]["username"]){
							$j++;	
						}
						if($j == count($result)){
							$sql = $conn->prepare("INSERT INTO usernames (username) VALUES (:username)");
                			$sql->bindParam(':username', $username);

                			$username = $_POST["username"];
    						$sql->execute();
							//username inserted
							
							
							$sql = $conn->prepare("INSERT INTO users (email, password, username) VALUES (:email, :password, :username)");
                			$sql->bindParam(':email', $email);
                			$sql->bindParam(':password', $password);
                			$sql->bindParam(':username', $username);

                			$email = $_POST["email"];
                			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    						$sql->execute();
    						echo "You have been successfully registered<br>";
    						echo "<a href='index.php'>Do you want to login?</a>";
						} else {
							alert ("Username already exist");
							//reindirizzamento a index
						}
    				} else {
    					alert ("Email already exist");
    					//reindirizzamento a index
    				}
    			}

    			if(isset($_POST["login"])){
    				$username = $_POST["username"];
					$sql = $conn->prepare("SELECT username, password FROM users WHERE username LIKE '$username'");
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
							echo "<a href='index.php'>Do you want to return at the form page?</a>";
						} else {
							alert ("Incorrect password!");
							//reindirizzamento a index
						}
    				} else {
    					alert ("Username not valid!");
    					//reindirizzamento a index
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