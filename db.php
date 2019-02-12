<?php
    $dbhost = 'address:port';
    $dbuser = 'username';
    $dbpass = 'password';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'localdb');
    if(mysqli_connect_errno()) {
        // uncomment me to see App Service's MySQL connection string
        //die('MYSQLCONNSTR_localdb: ' . getenv('MYSQLCONNSTR_localdb'));
        die('Could not connect: ' . mysqli_error($conn));
    }
?>
