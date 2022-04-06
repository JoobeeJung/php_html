<?php



    function connectDB()
    {
        $dbHost = "localhost:3306";

        $dbUser = "root";
        $dbName = "mykb"; 
        $dbPass = "";
           
        $dbPort = "3306";

        $conn = mysqli_connect($dbHost, $dbUser,$dbPass, $dbName, $dbPort);
        //$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName) or die("Connect Fail to MySQL for XAMPP : %s\n". $conn->error);
        
        if($conn)
        {
            // echo "OK";
        }else
        {
            echo "fail";
        }

        return $conn;
    }

    function closeDB($conn)
    {
        $conn->close();
    }
?>
