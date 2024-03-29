<?php
    if(isset($_GET["idx"]))
        $idx = $_GET["idx"];
    else{
        echo "
        <script>
            alert('잘못 들어왔습니다.');
            location.href='main.php?cmd=70list';
        </script>
        ";
    }

    $sql = "select * from models where idx='$idx'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
    
    if(!$data)
    {
        echo "
        <script>
            alert('삭제된 제품입니다.');
            location.href='main.php?cmd=70list';
        </script>
        ";       
    }

    if(isset($_POST["mode"]))
    {
        $mode = $_POST["mode"];
    }

    if(isset($mode) and $mode == "putcart")
    {
        // idx, size, color, count
        $size = $_POST["size"];
        $color = $_POST["color"];
        $count = $_POST["count"];
        $price = $_POST["price"];

        if(isset($_SESSION[$sessId]))
            $id = $_SESSION[$sessId];
        else
            $id = "";
        $ip = $_SERVER["REMOTE_ADDR"];
        $cartSql = "INSERT INTO cart
                 (id, midx, size, color, count, price, time, ip)
                 values 
                 ('$id', '$idx', '$size', '$color', '$count', '$price', '$_SESSION[$sessTime]', '$ip')";
        $cartResult = mysqli_query($conn, $cartSql);
        echo "
        <script>
            alert('장바구니에 담았습니다.');
            location.href='main.php?cmd=$cmd&idx=$idx';
        </script>
        ";
    }


?>

<form method="post" action="main.php?cmd=<?php echo $cmd ?>&idx=<?php echo $idx?>">
<input type="hidden" name="mode" value="putcart">
<div class="row">
    <div class="col-4 colLine">
        <div class="row">
            <div class="col">
                <img src="data/img/bag1.jpg" class="img-fluid rounded">
            </div>
        </div>
        <div class="row">
            <div class="col"><img src="data/img/bag1.jpg" class="img-fluid rounded"></div>
            <div class="col"><img src="data/img/bag2.jpg" class="img-fluid rounded"></div>
            <div class="col"><img src="data/img/bag3.jpg" class="img-fluid rounded"></div>
            <div class="col"><img src="data/img/bag4.jpg" class="img-fluid rounded"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col colLine">
        <div class="row">
            <div class="col-4 colLine">제품명</div>
            <div class="col colLine fw-bold">
                <?php echo $data["models"]?>
            </div>
        </div>
        <div class="row">
            <div class="col-4 colLine">제조사</div>
            <div class="col colLine">KB 국민은행</div>
        </div>
        <div class="row">
            <div class="col-4 colLine">가격</div>
            <div class="col colLine">
                <input type="text" id="price" name="price" class="form-control" value="<?php echo $data["price"]?>" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-4 colLine">사이즈</div>
            <div class="col colLine">
                <select id="size" name="size" class="form-control">
                    <option value="">== 사이즈 선택 ==</option>
                    <?php 
                        $sizeList = explode(",", $data["size"]);
                        // 200,210,220,230
                        // [0]  [1]
                        $cnt = 0;
                        while($sizeList[$cnt])
                        {
                            echo "<option value='$sizeList[$cnt]'>$sizeList[$cnt]</option>";

                            $cnt ++;
                        }
 
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4 colLine">색상</div>
            <div class="col colLine">
                <select id="color" name="color" class="form-control">
                    <option value="">== 색상 선택 ==</option>
                    <?php 
                        $colorList = explode(",", $data["color"]);
                        // 200,210,220,230
                        // [0]  [1]
                        $cnt = 0;
                        while($colorList[$cnt])
                        {
                            echo "<option value='$colorList[$cnt]'>$colorList[$cnt]</option>";

                            $cnt ++;
                        }
 
                    ?>
                </select>
            </div>
        </div>        

        <div class="row">
            <div class="col-4 colLine">수량</div>
            <div class="col colLine">
                <input type="number" id="count" name="count" value="1" max="10" min="1" class="form-control" onChange=updatePrice()>
            </div>
        </div>
        <div class="row">
            <div class="col-4 colLine">합계</div>
            <div class="col colLine">
                <input type="text" id="total" value="<?php echo $data["price"]?>" class="form-control" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col colLine text-center">
                <button type="submit" class="btn btn-outline-primary">장바구니(Form)</button> 
                <button type="button" class="btn btn-outline-primary">장바구니(Ajax)</button>
            </div>
        </div>
    </div>

</div>
</form>

<script>
    function updatePrice()
    {
        let price = $("#price").val();
        let count = document.querySelector("#count").value;
        let total = price * count;
        $("#total").val(total);
    }
</script>

<?php
   $now = getNow();
   echo "now = $now";
   
?>