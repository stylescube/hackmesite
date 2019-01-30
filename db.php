<?php
    $dbhost = '127.0.0.1:49944';
    $dbuser = 'azure';
    $dbpass = '6#vWHD_$';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'localdb');
    if(mysqli_connect_errno()) {
        die('Could not connect: ' . mysqli_error($conn));
    }
?>
