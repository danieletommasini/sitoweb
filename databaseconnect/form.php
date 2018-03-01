<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		form{text-align:center}
	</style>
	<title></title>
</head>
<body>

	
	
	

	<?php
    session_start();
    if(isset($_SESSION["id"])){

        echo "<form class='form' action='loginregister.php' method='post'>
            <input type='submit' name='logout' value='LOGOUT'><br><br> 
            </form>";

        echo "<form class='form' action='form.php' method='post'> <br>
        -------------- INSERT NEW SAILOR -------------- <br><br>
        Name: <input type='text' name='name'> <br>
        Surname: <input type='text' name='surname'> <br>
        Boat ID: <input type='number' name='boatid' value='1'> <br><br>
        <input type='submit' name='insert' value='INSERT'> <br><br>
        </form>";

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "databoat";

		if(array_key_exists('name', $_POST) && array_key_exists('surname', $_POST) && array_key_exists('boatid', $_POST)){
	
			
	
	
			try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			$sql = $conn->prepare("INSERT INTO `marinaio`(`nome`, `cognome`, `idbarca`) VALUES (:nome, :cognome, :idbarca)");
                $sql->bindParam(':nome', $name);
                $sql->bindParam(':cognome', $surname);
                $sql->bindParam(':idbarca', $boatid);
    			// use exec() because no results are returned
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $boatid = $_POST["boatid"];
    			$sql->execute();
    			echo "<form action='form.php' method='post'>New record created successfully<br>"; 
    			$sql = $conn->prepare("SELECT * FROM `marinaio`");
                $sql->execute();
                $result = $sql->fetchAll();
    			echo "The list of sailors is: <br>"; 
    			foreach($result as $row){
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
        $conn = null;
    	
    	if(isset($_POST["delete"])){
    		try {
   				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			foreach($_POST as $index => $value){
    				if($_POST["$index"] == "tupla"){
    					$sql = $conn->prepare("DELETE FROM `marinaio` WHERE idmarinaio = :index");
                        $sql->bindParam(':index', $index);
    					$sql->execute();
    				} 
    			}
    			echo "<form action='form.php' method='post'>Record(s) deleted successfully<br>"; 
    			$sql = $conn->prepare("SELECT * FROM `marinaio`");
                $sql->execute();
                $result = $sql->fetchAll();
    			echo "The list of sailors is: <br>"; 
    			foreach($result as $row){
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
    } else {
        echo "You have to be logged in.<br>";
        echo "<a href='index.php'>Do you want to login?</a>";
    }
	?>

</body>
</html>