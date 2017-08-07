<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbName = 'myTest';

$conn = mysqli_connect($host, $user, $pw, $dbName);

if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$sql = "select * from boardtest order by num desc";
$result = mysqli_query($conn, $sql);

$sql_count = "select count(*) from boardtest";
$result_count = mysqli_query($sql_count, $conn);
$count = mysqli_fetch_row($result_count);
$total_row = $count[0];

while ($row = mysqli_fetch_assoc($result)) {
	echo "{$total_row}";
	echo "{$row['writer']}";
	echo "{$row['subject']}";
}

mysqli_close($conn);

?>
