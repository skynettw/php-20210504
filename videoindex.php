<?php include("header.php"); ?>
	<div class="container">
<?php include("menu.php"); ?>
<?php
include("database.php");

$sql = "SELECT *  FROM video";
$result = $conn->query($sql);
?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
      $count = 0;
      while($row = $result->fetch_assoc()) {
        if ($count==0) {
          echo '<div class="carousel-item active">';
        } else {
          echo '<div class="carousel-item">';
        }
        $count ++;
        echo "<img src='https://i.ytimg.com/vi/" . $row["vid"] . "/hqdefault.jpg' class='d-block w-100' alt='...'>";
        echo '</div>';
      }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<?php
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table class='table table-striped'>";
  echo "<tr><td>影片名稱</td><td>張貼時間</td></tr>";
  while($row = $result->fetch_assoc()) {
  	echo "<tr>";
	    echo "<td><a href='play.php?id=" . $row["id"] . "'>" . $row["title"]. "</a><br>" . 
            "<img src='https://i.ytimg.com/vi/" . $row["vid"] . "/hqdefault.jpg' width=150></td>";
	    echo "<td>" . $row["created"]. "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>


</div>
<?php include("footer.php"); ?>
