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
    		echo "<script>history.go(-1);</script>";
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

							/*
							$to = $email;
							$subject = "Confirm the email to register";
							$txt = "Hello world!";
							$headers = "From: webmaster@example.com" . "\r\n" .
							"CC: somebodyelse@example.com";
							*/

							mail($to,$subject,$txt,$headers);
							
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
    						
    						$_SESSION["id"] = $email;
    						$_SESSION["username"] = $username;
    						
    						echo "<script>alert ('You have been successfully registered!');  history.go(-1);</script>";
    						
							
						} else {
							echo "<script>alert ('Username already taken!');  history.go(-1);</script>";
						}
    				} else {
    					echo "<script>alert ('Email already exists!');  history.go(-1);</script>";

    				}
    			}

    			if(isset($_POST["login"])){
    				$email = $_POST["email"];
    				$username = $_POST["username"];
					$sql = $conn->prepare("SELECT email, password FROM users WHERE email LIKE '$email'");
					$sql->execute();
                	$result = $sql->fetchAll();
					
					$i = 0;
					while($i < count($result) && $_POST["email"] != $result[$i]["email"]){
						$i++;	
					}
					if($i != count($result)){
						if(password_verify($_POST["password"], $result[$i]["password"])){
							$sql = $conn->prepare("SELECT usernames.username FROM usernames INNER JOIN users ON usernames.username = users.username WHERE users.email LIKE '$email'");
							$sql->execute();
                			$result = $sql->fetchAll();
							$_SESSION["id"] = $email;
							$_SESSION["username"] = $result[0]["username"];
							echo "<script>history.go(-1);</script>";
						} else {

							echo "<script>alert ('Incorrect password!'); history.go(-1);</script>";
						}
    				} else {
    					echo "<script>alert ('Username not valid!'); history.go(-1);</script>";

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