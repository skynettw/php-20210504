<?php
$id = $_GET['target'];
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM news WHERE id=$id";
$conn->query($sql);
$conn->close();

header('Location: index.php');
?>