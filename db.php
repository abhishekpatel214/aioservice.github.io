<?php
session_start();
$dbHost = 'localhost';
$dbname = 'aioservice';
$dbUsername = 'root';
$dbPassword = '';

$dbc=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbname);

?>