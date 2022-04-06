<!-- 
    프로그램 주요 동작:
      국민은행 고객 데이터를 활용하여, 지역별 고객분포 및 평균연령을 표현하는 그래프이다.
      구글의 콤보 차트를 활용하여 두가지 지표를 각각 bars, line 그래프로 표현하였다. 
      또한, 지역별 평균연령이 큰 차이가 없음을 감안하여 해당 y축의 최대 최소를 전체 지역별 평균 연령을 기준으로 계산하였다.
    개선점:
      지역별 고객수 뿐만 아니라 전체 고객수에 대한 비율까지 표시하면 좋을 듯하다.
-->

<div class="row">
    <div class="col colLine">
        <h5 class="text-primary">국민은행 고객 분포</h5>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          <?php
                $sql = "SELECT distinct local from kb_customer order by local asc";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($result);
                echo "[ '지역', '지역별 고객수', '지역별 평균연령'],";

                while($data)
                {
                    // 출력
                    $cntSql = "select count(*) as total, avg(left(now(),4)-left(birth,4)) as avg_age 
                                      from kb_customer 
                                      where local='$data[local]' 
                                            group by local ";
                    $cntResult = mysqli_query($conn, $cntSql);
                    $cntData = mysqli_fetch_array($cntResult);

                    echo "[ '$data[local]', $cntData[total], $cntData[avg_age] ],";
                    $data = mysqli_fetch_array($result);
                }
          ?>
          
        ]);
        <?php
          $cnt_sql = "SELECT count(distinct local) from kb_customer order by local asc";
          $result = mysqli_query($conn, $cnt_sql);
          $data = mysqli_fetch_array($result);

          $max_sql = "SELECT avg(left(now(),4)-left(birth,4))+0.2 as avg from kb_customer group by local order by avg desc";
          $max_result = mysqli_query($conn, $max_sql);
          $max_data = mysqli_fetch_array($max_result);

          $min_sql = "SELECT avg(left(now(),4)-left(birth,4))-0.2 as avg from kb_customer group by local order by avg asc";
          $min_result = mysqli_query($conn, $min_sql);
          $min_data = mysqli_fetch_array($min_result);
        ?>
        var options = {
         
          title : '국민은행 지역별 고객수와 평균 연령 분포',
          hAxis: {title: '지역'},
          seriesType: 'bars',
          series: {
            0: {
              targetAxisIndex:0, 
              type: 'bar'
            }, 
            1: {
              targetAxisIndex:1, 
              type: 'line'
            }
          },

          vAxes: {
            0: {
              title: '고객수',
            },
            1: {
              title:'평균연령', 
              viewWindow: {
                max: <?php echo "$max_data[0]" ?>,
                min: <?php echo "$min_data[0]" ?>,
              }
            }
          },
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);

      }
    </script>


<div class="row">
    <div class="col colLine">
      <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </div>
</div>