<!-- 
    프로그램 주요 동작:
        이 프로그램은 5초 단위로 층별 방문객 데이터를 랜덤으로 생성하여 bank 테이블에 INSERT 한다.
        2층은 1층의 2/3, 3층은 1층의 1/2 고객 수가 방문한다고 가정하였다.
    
    개선점:
        이전의 데이터도 함께 조회할 수 있는 기능을 추가하면 좋을듯하다.
-->

<div class="row">
    <div class="col colLine">
        <h5 class="text-primary"> 국민은행 방문객 데이터 생성 </h5>
    </div>
</div>

<?php
    $rand = rand(20, 30);
    $randFloor1 = rand(10, $rand);
    $randFloor2 = rand(5, ceil($rand * 2 / 3));
    $randFloor3 = rand(1, ceil($rand / 2));

    $sql = "INSERT INTO bank (branch, f1, f2, f3, time) 
                VALUES ('1', '$randFloor1', '$randFloor2', '$randFloor3', now())";
    $result = mysqli_query($conn, $sql);
?>

<div class="row">
    <div class="col colLine">
        randFloor1 = <?php echo $randFloor1 ?>
        randFloor2 = <?php echo $randFloor2 ?>
        randFloor3 = <?php echo $randFloor3 ?>
    </div>
</div>

<script>
    setTimeout(function(){
        location.href='main.php?cmd=66generator';
    },  5 * 1000);
</script>

