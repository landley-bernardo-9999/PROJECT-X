<?php
    define('db_server', 'localhost');
    define('db_username', 'root');
    define('db_password', 'VesterCorporation_123');
    define('db_name','vester_dbase_2');

    $conn = mysqli_connect(db_server, db_username, db_password, db_name);

   if(mysqli_connect_errno())
   {
       echo "Failed to connect to the database." . mysqli_connect_error();
   }
   
?>