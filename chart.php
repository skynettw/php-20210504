<?php include("header.php"); ?>
	<div class="container">
<?php include("menu.php"); ?>
<?php include("database.php");?>
<?php 
    $county = array();
    $infected = array();
    $sql = "SELECT * FROM covid19 order by infected desc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($county, $row["county"]);
            array_push($infected, $row["infected"]);
        }
    }

?>
<h1>我的統計圖表</h1>
<canvas id="myChart" width="800" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        <?php
        for ($i=0; $i<count($county); $i++) {
            echo "'" . $county[$i] . "',";
        }
        ?>
        ],
        datasets: [{
            label: '110年5月25日台灣地區染疫人數統計圖表',
            data: [
            <?php
                for ($i=0; $i<count($infected); $i++) {
                    echo "'" . $infected[$i] . "',";
                }
            ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php $conn->close(); ?>

</div>
<?php include("footer.php"); ?>
