<div class="row">
    <div class="col">
        <h5 class="text-primary">Birth</h5>
    </div>
</div>

<?php
    if(isset($_POST["name"]))
        $name = $_POST["name"];
    if(isset($_POST["birth"]))
        $birth = $_POST["birth"];
    if(isset($_POST["idx"]))
        $idx = $_POST["idx"];
    if(isset($_POST["city"]))
        $city = $_POST["city"];
    if(isset($_POST["mode"]))
        $mode = $_POST["mode"];

    if(isset($_GET["mode"]))
        $mode = $_GET["mode"];
    if(isset($_GET["idx"]))
        $idx = $_GET["idx"];


    if(isset($mode ) and $mode == "delete")
    {
        // delete from table where .
        $sql = "DELETE FROM birth_table
                    WHERE idx='$idx' ";
        echo $sql;
        $result = mysqli_query($conn, $sql);
        $affectedCount = mysqli_affected_rows($conn);

        if($affectedCount ==1)
            $msg = "삭제 성공";
        else
            $msg = "삭제 실패";

        echo " $sql
        <script>
            alert('$msg');
            location.href='main.php?cmd=59birth';
        </script>
        ";  
    }

    if(isset($mode ) and $mode == "update")
    {
        // update birth_table set a=b, c=d, ... where idx=..
        $sql = "UPDATE birth_table SET 
                    name='$name', birth='$birth', city='$city'
                    WHERE idx='$idx' ";
        
        $result = mysqli_query($conn, $sql);
        
        $affectedCount = mysqli_affected_rows($conn);
        if($affectedCount ==1)
            $msg = "변경 성공";
        else
            $msg = "변경 실패";

        echo " $sql
        <script>
            alert('$msg');
            location.href='main.php?cmd=59birth';
        </script>
        ";  
    }

    if(isset($mode) and $mode == "insert")
    {
        //$age = 77;
        $sql = "INSERT INTO birth_table (name, birth, city) 
                    VALUES ('$name', '$birth', '$city') ";
        $result = mysqli_query($conn, $sql);
        $affectedCount = mysqli_affected_rows($conn);
        if($affectedCount ==1)
            $msg = "등록 성공";
        else
            $msg = "등록 실패";

        echo " $sql
        <script>
            alert('$msg');
            location.href='main.php?cmd=59birth';
        </script>
        ";  
    }

?>

<form method="post" action="main.php?cmd=59birth">
<input type="hidden" name="mode" value="insert">    
<div class="row">
    <div class="col">
        <input type="text" class="form-control" name="name" placeholder="이름">
    </div>
    <div class="col">
        <input type="date" class="form-control" name="birth" placeholder="생일">
    </div>
    <div class="col">
        <input type="text" class="form-control" name="city" placeholder="도시">
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary">등록</button>
    </div>
</div>
<div class="row">
    <div class="col" id="result">
        
    </div>
</div>

</form>

<!-- 
    순서    아이디  이름    비번    비고
-->

<script>
    function confirmDelete(pidx)
    {
        if(confirm('삭제된 데이터는 복구할 수 없습니다.\n정말 삭제하시겠습니까?'))
        {
            location.href='main.php?cmd=58insert&mode=delete&idx='+pidx;
        }
        
    }
</script>

<div class="row">
    <div class="col colLine">순서</div>
    <div class="col colLine">이름</div>
    <div class="col colLine">생일</div>
    <div class="col colLine">도시</div>
    <div class="col colLine">비고</div>
</div>

<?php
    $sql = "SELECT count(*) as total FROM birth_table ORDER BY name ASC";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $total = $data["total"];
    echo "total = $total <br>";
    $LPP = 3;
    $totalPage = ceil($total/$LPP);
    echo "totalPage = $totalPage<br>";

    if(isset($_GET["page"]))
    {
        $page = $_GET["page"];
    }
    
    if(!isset($page))
    {
        $page= 1;
    }

    $start = ($page-1) * $LPP;

    $sql = "SELECT * FROM birth_table ORDER BY name ASC LIMIT $start, $LPP";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    while($data)
    {
        // 출력
        ?>
        <form method="post" action="main.php?cmd=59birth">
        <input type="hidden" name="mode" value="update">
        <input type="hidden" name="idx" value="<?php echo $data["idx"] ?>">
        <div class="row">
            <div class="col colLine"><?php echo $data["idx"] ?></div>
            <div class="col colLine"><input type="text" name="name" class="form-control" value='<?php echo $data["name"] ?>'></div>
            <div class="col colLine"><input type="date" name="birth" class="form-control" value='<?php echo $data["birth"] ?>'></div>
            <div class="col colLine"><input type="text" name="city" class="form-control" value='<?php echo $data["city"] ?>'></div>
            <div class="col colLine">
                <button type="submit" class="btn btn-danger btn-sm">수정</button>
            
                <button type="button" class="btn btn-danger btn-sm" onClick=confirmDelete(<?php echo $data["idx"] ?>)>삭제</button>

                <button type="button" class="btn btn-primary btn-sm" onClick=getUserInfo(<?php echo $data["idx"] ?>)>보기</button>
            </div>
        </div>
        </form>
        <?php
        $data = mysqli_fetch_array($result);
    }
    ?>
    <div class="row">
        <div class="col colLine text-center">
            <?php
                for($i = 1; $i<= $totalPage; $i++)
                {
                    if($i == $page)
                    {
                        echo "<a href='main.php?cmd=59birth&page=$i'><span class='badge bg-primary'>$i</span></a> ";

                    }else
                    {
                        echo "<a href='main.php?cmd=59birth&page=$i'><span class='badge bg-secondary'>$i</span></a> ";

                    }
                }
            ?>
        </div>
    </div>

    <?php
?>
