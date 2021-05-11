<?php
$title = $_POST['title'];
include("database.php");


$sql = "INSERT INTO news (title) VALUES ('$title')";
$conn->query($sql);
$conn->close();
header('Location: index.php');
?>
