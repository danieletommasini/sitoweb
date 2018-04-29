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
    
    $content = $_POST["content"];
    $code = $_POST["code"];
    
    $sql = $conn->prepare("INSERT INTO `comments` (`id_post`, `content`, `code`, `email`) VALUES (:id_post, :content, :code, :email);");
    
    $sql->bindParam(':id_post', $id_post);
    $sql->bindParam(':content', $content);
    $sql->bindParam(':code', $code);
    $sql->bindParam(':email', $email);
    
    if($content != ""){
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