<?php

    include "db.php";
    $conn = connectDB();

    $id = $_POST["id"];
    $memberFlag = false;

    if(isset($_POST["name"]))
    {
        $name = $_POST["name"];
    }
    if(isset($id))
    {
        if(isset($name))
        {
            $sql = "select * from members WHERE id = '$id' and name='$name' ";

            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            if(isset($data))
            {
                $memberFlag =true;
            }else
            {
                $sql = "select * from members WHERE id = '$id' ";
            }
        }else
        {
            $sql = "select * from members WHERE id = '$id' ";
        }
    }

    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    
    if(isset($data))
    {
        if($memberFlag)
        {
            echo "<aaa><span class='text-warning'> 이미 가입되어있는 회원입니다. </span>";
        }else
        {
            echo "<aaa><span class='text-danger'> 이미 사용중인 아이디입니다 </span>";
        }
    }else
    {
        echo "<span class='text-primary'> 사용 가능한 아이디입니다.</data>";
    }

    closeDB($conn);
?>