<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";
$email = $_SESSION["id"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $category = $_POST["category"];
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $content = $_POST["textarea"];
    
    $sql = $conn->prepare("INSERT INTO post (category, email, title, description, content) VALUES (:category, :email, :title, :description, :content)");
    $sql->bindParam(':category', $category);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':title', $title);
    $sql->bindParam(':description', $desc);
    $sql->bindParam(':content', $content);
    
    if($title != "" && $desc != "") { 
        $sql->execute();
    } else {
        echo "<script>alert('Fill the fields before to send')</script>";
    }
    
    echo "<script>history.go(-1);</script>";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>