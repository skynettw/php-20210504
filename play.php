<?php
    include("header.php");
	$id = $_GET["id"];
	include("database.php");

	$sql = "SELECT * FROM video WHERE id=$id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo "<center>";
		echo "<h2>" . $row["title"] . "</h2>";
		echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $row["vid"] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		echo "<br><a href='index.php'>返回首頁</a>";
		echo "</center>";
	} else {
		echo "找不到你指定的影片！";
	}
	include("footer.php");
?>