<?php
    $dbhost = 'address:port';
    $dbuser = 'username';
    $dbpass = 'password';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'localdb');
    if(mysqli_connect_errno()) {
        die('Could not connect: ' . mysqli_error($conn));
    }
?>
