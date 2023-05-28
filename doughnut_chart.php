<?php
include('koneksidatacovid.php');
$data = mysqli_query($koneksi, "SELECT * FROM covid_data");
$country_other = array();
$total_cases = array();
$total_deaths = array();
$total_recovered = array();
$active_cases = array();
$total_tests = array();
$population = array();
while ($row = mysqli_fetch_array($data)) {
    $country_other[] = $row['country_other'];
    $total_cases[] = $row['total_cases'];
    $total_deaths[] = $row['total_deaths'];
    $total_recovered[] = $row['total_recovered'];
    $active_cases[] = $row['active_cases'];
    $total_tests[] = $row['total_tests'];
    $population[] = $row['population'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Membuat Grafik Menggunakan Chart JS</title>
<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<div style="width: 800px; height: 800px;">
    <canvas id="myChart"></canvas>
</div>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($country_other); ?>,
        datasets: [{
            label: 'COVID-19 Data',
            data: <?php echo json_encode($total_cases); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', // Default color
                'rgba(54, 162, 235, 0.2)', // Default color
                'rgba(255, 206, 86, 0.2)', // Default color
                'rgba(75, 192, 192, 0.2)', // Default color
                'rgba(153, 102, 255, 0.2)', // Default color
                'rgba(255, 159, 64, 0.2)',  // Default color
                'rgba(255, 0, 0, 0.2)',      // Custom color for Iran (Red)
                'rgba(0, 255, 0, 0.2)',      // Custom color for Indonesia (Green)
                'rgba(0, 0, 255, 0.2)',      // Custom color for Malaysia (Blue)
                'rgba(255, 255, 0, 0.2)'     // Custom color for Israel (Yellow)
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',    // Default color
                'rgba(54, 162, 235, 1)',    // Default color
                'rgba(255, 206, 86, 1)',    // Default color
                'rgba(75, 192, 192, 1)',    // Default color
                'rgba(153, 102, 255, 1)',   // Default color
                'rgba(255, 159, 64, 1)',    // Default color
                'rgba(255, 0, 0, 1)',        // Custom color for Iran (Red)
                'rgba(0, 255, 0, 1)',        // Custom color for Indonesia (Green)
                'rgba(0, 0, 255, 1)',        // Custom color for Malaysia (Blue)
                'rgba(255, 255, 0, 1)'       // Custom color for Israel (Yellow)
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        legend: {
            position: 'right'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
});
</script>
</body>
</html>
