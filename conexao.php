<?php
$hn = 'localhost';
$db = 'dbdecision';
$un = 'root';
$pw = '';
$conn = new mysqli($hn, $un, $pw, $db);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) die("Fatal Error");