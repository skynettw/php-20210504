<?php
$id = $_GET['target'];
include("database.php");

$sql = "DELETE FROM news WHERE id=$id";
$conn->query($sql);
$conn->close();

header('Location: index.php');
?>