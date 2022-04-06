<!-- 
    프로그램 주요 동작:
        국민은행 방문객 테이블 데이터로 실시간 방문객의 층별 추이를 그래프로 표현한다.
        최근 30개 데이터를 기준으로 5초에 한번씩 자동 업데이트 된다.
    
    개선점:
        층별로 분포를 비율로 비교하면 좋을듯하다. 
        또한, 가장 많은 방문객이 있는 시간대와 층수를 표시하면 유의미한 결과를 이끌어낼 수 있다.
-->

<div class="row">
    <div class="col colLine">
        <h5 class="text-primary"> 국민은행 층별 방문객 실시간 그래프 </h5>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['시간', '1층', '2층', '3층'],

          <?php
            $sql = "SELECT time FROM (SELECT time FROM bank ORDER BY time DESC LIMIT 30) AS t ORDER BY time ASC";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            
            while($data) {
                $bankSql = "SELECT f1, f2, f3 FROM bank WHERE time='$data[time]'";
                $bankResult = mysqli_query($conn, $bankSql);
                $bankData = mysqli_fetch_array($bankResult);

                echo "['$data[time]', $bankData[f1], $bankData[f2], $bankData[f3]],";

                $data = mysqli_fetch_array($result);
            }
          ?>
        ]);

        var options = {
          title: '실시간 층별 방문객',
          curveType: 'function',
          legend: { position: 'top' },
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
</script>

<div class="row">
    <div class="col colLine">
        <div id="curve_chart" style="width: 100%; height: 800px"></div>
    </div>
</div>

<script>
    setTimeout( function(){
      location.href='main.php?cmd=67graph';
    }   , 5 * 1000); // UNIT : ms
</script>
