<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/php_mvc/public/css/Admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin</title>
</head>

<div class="chartjs">
  <div class="Totaltype">
    <div class="title">
      <div class="big">Total type</div>
      <div class="small">The billing cycle</div>
    </div>
    <div class="chart">
      <canvas id="myChart"></canvas>
    </div>
  </div>
  <div class="Totalday">
    <div class="title">
      <div class="big">Total day</div>
      <div class="small">Review last weak</div>
    </div>
    <div class="chart">
      <canvas id="myChart2"></canvas>
    </div>
  </div>
  <div class="alluser">
    <div class="title">
      All User
    </div>
<div class="mid">
  <img src="http://localhost/php_mvc/public/image/barista.png" alt="">
<div class="count" data-target="<?php while($row= mysqli_fetch_array($data['User'])){
echo $row['COUNT(*)'];
}

?>">0</div>
</div>
<div class="bottom">
  <ion-icon name="arrow-up-outline"></ion-icon>
<div class="bot" data-up="40">
0
</div>
<span>%</span>
</div>
  </div>
</div>
<div class="chartjs2">
  <div class="Totalmonth">
    <div class="title">
      <div class="big">Total month</div>
      <div class="small">Review year</div>
    </div>
    <div class="chart">
      <canvas id="myChart3"></canvas>
    </div>
  </div>

</div>
<script src="http://localhost/php_mvc/public/js/Admin.js">
</script>
<script>
  var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['OK', 'WARNING', 'CRITICAL', 'UNKNOWN'],
    datasets: [{
      label: '# of Tomatoes',
      data: [12, 19, 3, 5],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
   	//cutoutPercentage: 40,
    responsive: false,

  }
});
 
</script>
<script>
 

</script>
<script>
 
  </script>
   

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>