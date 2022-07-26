<?php
$servername="sql6.freemysqlhosting.net";
$username="sql6508810";
$password="aSuaJfzPHz";
$dbname="sql6508810";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
  }
  ?>