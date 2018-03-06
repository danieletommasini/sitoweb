<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		form{text-align:center}
	</style>
	<title></title>
</head>
<body>

	<form class="form" action="index_databaseconnect.php" method="post"> <br>
		-------------- INSERT NEW USER -------------- <br><br>
		Name: <input type="text" name="name"> <br>
		Surname: <input type="text" name="surname"> <br>
		Email: <input type="text" name="email"> <br>
		Password: <input type="text" name="psw"> <br><br>
		<input type="submit" name="insert" value="INSERT"> <br><br>
	</form>
	
	

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "forum";

		if(array_key_exists('name', $_POST) && array_key_exists('surname', $_POST) && array_key_exists('email', $_POST) && array_key_exists('psw', $_POST)){
	
			$name = $_POST["name"];
			$surname = $_POST["surname"];
			$email = $_POST["email"];
			$psw = $_POST["psw"];
	
	
			try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			$sql = "INSERT INTO `Users`(`name`, `surname`, `email`, `password`) VALUES ('$name','$surname','$email','$psw')";
    			// use exec() because no results are returned
    			$conn->exec($sql);
    			echo "<form action='index_databaseconnect.php' method='post'>New record created successfully<br>"; 
    			$sql = "SELECT * FROM `Users`";
    			echo "The list of users is: <br>"; 
    			foreach($conn->query($sql) as $row){
    				$id = $row['Email'];
    				echo "<input type='checkbox' name='$id'> ";
    				print $row['Name'] . "\t";
    				print $row['Surname'] . "\t";
    				print $row['Email'] . "<br>";
    			}
    			echo "<input type='submit' name='delete' value='DELETE'></form>";
   			} catch(PDOException $e) {
    			echo "Connection failed: " . $e->getMessage();
    		}	
   		}
    	
    	if(isset($_POST["delete"])){
    		try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			foreach($_POST as $index => $value){
    				if(isset($_POST["$index"])){
    					$sql = "DELETE FROM `Users` WHERE `Email` = '$index'";
    					$conn->exec($sql);
    				} 
    			}
    			echo "<form action='index_databaseconnect.php' method='post'>Record(s) deleted successfully<br>"; 
    			$sql = "SELECT * FROM `Users`";
    			echo "The list of users is: <br>"; 
    			foreach($conn->query($sql) as $row){
    				$id = $row['Email'];
    				echo "<input type='checkbox' name='$id'> ";
    				print $row['Name'] . "\t";
    				print $row['Surname'] . "\t";
    				print $row['Email'] . "<br>";
    			}
    			echo "<input type='submit' name='delete' value='DELETE'></form>";
    		} catch(PDOException $e) {
    			echo "Connection failed: " . $e->getMessage();
    		}
    	}
	?>

</body>
</html>