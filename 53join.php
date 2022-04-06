<div class="row">
    <div class="col">
        <h5 class="text-primary">회원 가입</h5>
    </div>
</div>
<?php
    if(isset($_POST["id"]))
        $id = $_POST["id"];
    if(isset($_POST["name"]))
        $name = $_POST["name"];
    if(isset($_POST["pass"]))
        $pass = $_POST["pass"];
    if(isset($_POST["mode"]))
        $mode = $_POST["mode"];
    if(isset($_POST["age"]))
        $mode = $_POST["age"];

    if(isset($mode ) and $mode == "join")
    {
        //$age = 77;
        $sql = "INSERT INTO members (id, name, pass, level, age) 
                    VALUES ('$id', '$name', password('$pass'), '1' , '$age') ";
        $result = mysqli_query($conn, $sql);
        $affectedCount = mysqli_affected_rows($conn);
        if($affectedCount ==1)
            $msg = "회원가입이 완료되었습니다. 환영합니다.";
        else
            $msg = "가입 실패";

        echo " $sql
        <script>
            alert('$msg');
            //location.href='main.php?cmd=53join';
        </script>
        ";  
    }

?>
<script>
    function getUserInfo(pidx)
    {
        let result = document.querySelector("#result");
        //let param = "idx="+pidx;
        // JSON : JavaScript Object Notation
        //          Dictionary Type
        let jsonData = {
            "idx":pidx , 
            "test":"Hello"
        };
        $.ajax({
            url: "54ajaxUserInfo.php",
            data: jsonData,
            type:"POST",
            //dataType: "json",
            cache:false,
            success:function(rcvData){
                $("#result").html(rcvData);
            }
        });
    }
</script>


<form method="post" action="main.php?cmd=53join">
<input type="hidden" name="mode" value="join">    
<div class="row">
    <div class="col">
        <input type="text" class="form-control" name="id" id="id" placeholder="ID" onKeyUp=checkIdValid()>
    </div>
    <div class="col">
        <input type="text" class="form-control" name="pass" placeholder="PASSWD">
    </div>
    <div class="col">
        <input type="text" class="form-control" name="name" id="name" onKeyUp=checkIdValid() placeholder="실명입력">
    </div>
    <div class="col">
        <button type="submit" id="join" onclick="checkValid()" class="btn btn-primary">가입</button>
        <input type="text" class="form-control" name="age" placeholder="나이입력">
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary">가입</button>
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

<div class="row">
    <div class="col colLine">순서</div>
    <div class="col colLine">아이디</div>
    <div class="col colLine">이름</div>
    <div class="col colLine">나이</div>
    <div class="col-6 colLine">비번</div>
    <div class="col colLine">비고</div>
</div>

<?php
    $sql = "SELECT * FROM members ORDER BY name ASC";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    while($data)
    {
        // 출력
        ?>
        <div class="row">
            <div class="col colLine"><?php echo $data["idx"] ?></div>
            <div class="col colLine"><?php echo $data["id"] ?></div>
            <div class="col colLine"><?php echo $data["name"] ?></div>
            <div class="col colLine"><?php echo $data["age"] ?></div>
            <div class="col-6 colLine"><?php echo $data["pass"] ?></div>
            <div class="col colLine">
                <button type="button" class="btn btn-primary btn-sm" onClick=getUserInfo(<?php echo $data["idx"] ?>)>보기</button>
            </div>
        </div>
        <?php
        $data = mysqli_fetch_array($result);
    }
?>


<script>
    function checkIdValid()
    {
        let joinButton = document.querySelector("#join");
        joinButton.disabled = false;

        let id = document.querySelector("#id").value;
        let result = document.querySelector("#result");
        let name = document.querySelector("#name").value;

        let param = "id="+id;
        if(name)
        {
            param += "&name="+name;
        }
        $.ajax({
            url: "54ajaxServer.php",
            data:  param,
            type: "POST",
            cache: false,
            success: function(data) {
                $("#result").html(data);
            } 

        });

    }

    function checkValid()
    {
        let result = document.querySelector("#result");
        
        if(result)
        {
            if(result.innerHTML.includes("aaa"))
            {
                alert("회원가입을 하실 수 없습니다.")
                let joinButton = document.querySelector("#join");
                joinButton.disabled = true;
                return false;
            }
        }
    }

</script>