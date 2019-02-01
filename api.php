<?php
include 'db.php';

if (mysqli_connect_errno()) {
  die('Could not connect: ' . mysqli_error($conn));
}

if ($_GET['action'] == 'purchase') {
  $sql = 'INSERT INTO orders (`cid`, `pid`) VALUES (' . $_GET['cid'] . ',' . $_GET['pid'] . ')';
  $retval = mysqli_query( $conn, $sql );
  mysqli_close($conn);
}
else {
  die('unknown action');
}
