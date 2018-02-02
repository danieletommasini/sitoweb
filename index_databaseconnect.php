<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		form{text-align:center}
	</style>
	<title></title>
</head>
<body>

	<form class="form" action="index.php" method="post"> <br>
		-------------- INSERT NEW SAILOR -------------- <br><br>
		Name: <input type="text" name="name"> <br>
		Surname: <input type="text" name="surname"> <br>
		Boat ID: <input type="number" name="boatid" value="1"> <br><br>
		<input type="submit" name="insert" value="INSERT"> <br><br>
	</form>
	
	

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "databoat";

		if(array_key_exists('name', $_POST) && array_key_exists('surname', $_POST) && array_key_exists('boatid', $_POST)){
	
			$name = $_POST["name"];
			$surname = $_POST["surname"];
			$boatid = $_POST["boatid"];
	
	
			try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			$sql = "INSERT INTO `marinaio`(`nome`, `cognome`, `idbarca`) VALUES ('$name','$surname','$boatid')";
    			// use exec() because no results are returned
    			$conn->exec($sql);
    			echo "<form action='index.php' method='post'>New record created successfully<br>"; 
    			$sql = "SELECT * FROM `marinaio`";
    			echo "The list of sailors is: <br>"; 
    			foreach($conn->query($sql) as $row){
    				$id = $row['idmarinaio'];
    				echo "<input type='checkbox' name='$id' value='tupla'> ";
    				print $row['nome'] . "\t";
    				print $row['cognome'] . "\t";
    				print $row['idbarca'] . "<br>";
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
    				if($_POST["$index"] == "tupla"){
    					$sql = "DELETE FROM `marinaio` WHERE idmarinaio = $index";
    					$conn->exec($sql);
    				} 
    			}
    			echo "<form action='index.php' method='post'>Record(s) deleted successfully<br>"; 
    			$sql = "SELECT * FROM `marinaio`";
    			echo "The list of sailors is: <br>"; 
    			foreach($conn->query($sql) as $row){
    				$id = $row['idmarinaio'];
    				echo "<input type='checkbox' name='$id' value='tupla'> ";
    				print $row['nome'] . "\t";
    				print $row['cognome'] . "\t";
    				print $row['idbarca'] . "<br>";
    			}
    			echo "<input type='submit' name='delete' value='DELETE'></form>";
    		} catch(PDOException $e) {
    			echo "Connection failed: " . $e->getMessage();
    		}
    	}
	?>

</body>
</html>