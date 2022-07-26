<?php
include 'connect.php';
session_start();
$_SESSION["user"] = "";
$_SESSION["role"] = "";
$_SESSION["avatar"] = "";
$_SESSION["magv"] = "";
header('location:index.php');
?>