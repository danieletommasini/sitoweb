<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";
$id_post = $_COOKIE["id_post"];
$email = $_SESSION["id"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $content = $_POST["textarea"];
    echo "<script>alert('Comment successfully inserted.');history.go(-1);</script>";
    
    $sql = $conn->prepare("INSERT INTO `comments` (`id_post`, `content`, `email`) VALUES (:id_post, :content, :email);");
    
    $sql->bindParam(':id_post', $id_post);
    $sql->bindParam(':content', $content);
    $sql->bindParam(':email', $email);
    
    $sql->execute();
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>