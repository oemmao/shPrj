<?php

$host = 'localhost:3307';
$user = 'root';
$pw = '111111';
$dbName = 'myTest';
$userID = $_POST['insertID'];

$conn = mysqli_connect($host,$user,$pw,$dbName);

$sql = "select * from loginTest where leaveCheck='F' and userID='$userID'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count == 0) { //��밡���� ���̵�
	$checkidResult = "1";
	echo "{$checkidResult}";
} else {
	$checkidResult = "0"; //���̵� �ߺ�
	echo "{$checkidResult}";
}

mysqli_close($conn);
?>