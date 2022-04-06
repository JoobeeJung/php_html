<!-- 
    프로그램 주요 동작:
        해당 프로그램은 kb_customer 테이블을 바탕으로 지역별 고객수와 평균나이를 표현하는 차트이다.
        Line Chart에 대하여 이중축을 설정하고 축의 최솟값을 지정하여 
        두개의 데이터를 한개의 차트에 효과적으로 표현하였다.
    
    개선점:
        데이터 레이블 추가
-->

<div class="row">
    <div class="col colLine">
        <h5 class="text-primary">지역별 고객 통계</h5>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['지역', '고객수(명)', '평균나이(세)'],

          <?php
            $sql = "SELECT distinct local FROM kb_customer order by local asc";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            while($data) {
                // 출력
                $cntSql = "SELECT count(*) as total FROM kb_customer WHERE local='$data[local]'";
                $cntResult = mysqli_query($conn, $cntSql);
                $cntData = mysqli_fetch_array($cntResult);

                $avgSql = "SELECT avg(left(now(), 4) - left(birth, 4)) as avgAge FROM kb_customer WHERE local='$data[local]' group by local";
                $avgResult = mysqli_query($conn, $avgSql);
                $avgData = mysqli_fetch_array($avgResult);

                echo "['$data[local]', $cntData[total], $avgData[avgAge]],";
                $data = mysqli_fetch_array($result);
            }

            $minAge = "SELECT min($avgData[avgAge]) as minAge FROM kb_customer limit 1";
            $minResult = mysqli_query($conn, $minAge);
            $minData = mysqli_fetch_array($minResult);
          ?>
        ]);

        var options = {
          width: 1200,
          series: {
            0: {targetAxisIndex: 0, type: 'bars'},
            1: {targetAxisIndex: 1, type: 'line'}
          },
          title: '지역별 고객수 및 평균나이',
          vAxes: {
            // Adds titles to each axis.
            0: {title: '고객수(명)'},
            1: {title: '평균나이(세)', viewWindow: {min: <?php echo "$minData[minAge] - 1" ?>}}
            }
          };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>

<div class="row">
    <div class="col colLine">
        <div id="chart_div" style="width: 100%; height: 700px;"></div>
    </div>
</div>