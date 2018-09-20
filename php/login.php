<?php

    include 'config.php';
    
    $userName = mysqli_real_escape_string($conn,$_POST['userName']); 
    $pass = md5(mysqli_real_escape_string($conn,$_POST['pass']));

    $query = "SELECT * FROM info WHERE userName = '$userName' AND pass = '$pass' AND isApproved = 1";
    
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_row($result))
        {
            session_start();
            $_SESSION['firstName'] = $row[2];;
            $welcome = $_SESSION['firstName'];
            header("location: pages/dashboard.php");
        }
    }
    else
    {
        header("location: ../index.php");
    }

?>