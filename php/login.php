<?php

    include 'config.php';
    
    $userName = mysqli_real_escape_string($conn,$_POST['userName']); 
    $pass = md5(mysqli_real_escape_string($conn,$_POST['pass']));

    $query = "SELECT * FROM info WHERE userName = '$userName' AND pass = '$pass' ";
    
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0)
    {
        $data = mysqli_fetch_array($result);
      
        
        session_start();
        $_SESSION['myusername'] = $userName;
        header("location: pages/dashboard.php");
    }
    else
    {
        header("location: ../index.php");
    }

?>