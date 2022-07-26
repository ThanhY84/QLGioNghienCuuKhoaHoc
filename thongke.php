<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
<?php
 $sql = "SELECT  TenGV, sum(GioQuyDoi) AS gio
 FROM thuchienspnckh, giangvien
 WHERE thuchienspnckh.MaGV = giangvien.MaGV
 GROUP BY TenGV";
 $data = Database::GetData($sql);
?>


<canvas id="bieudo"></canvas>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="./chart.js/Chart.min.js"></script>
<script>
var d = <?php echo json_encode($data); ?>;

var labels = [];
var datas = [];

d.forEach(e => {
    labels.push(e.TenGV);
    datas.push(e.gio);
});

const data = {
  labels: labels,
  datasets: [{
    label: '',
    data: datas,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

    const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

new Chart($('#bieudo'), config);
</script>
</div>
<?php include 'footer.php'?>