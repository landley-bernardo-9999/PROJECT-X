<?php
    include 'config.php';
    
    $username = mysqli_real_escape_string($conn,$_POST['userName']); 
    $pass = mysqli_real_escape_string($conn,$_POST['pass']);

    $query = "SELECT * FROM info WHERE userName = '$username' AND pass = '$pass' ";
    
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Welcome, $username');</script>";
      
    }else{
        echo "<script>alert('Username or password is incorrect!');</script>";
    }

?>