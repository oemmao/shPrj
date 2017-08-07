<?php

session_start();

$host = 'localhost:3307';
$user = 'root';
$pw = '111111';
$dbName = 'myTest';
$userID = $_POST['insertID'];
$userPW = $_POST['insertPW'];
$userName = $_POST['insertName'];
$checkID = $_POST['checkid'];

if ($userID=="" || $userPW=="" || $userName=="" ) {
	echo "빈칸을 모두 채워주세요";
} else {
	
	$conn = mysqli_connect($host,$user,$pw,$dbName);

	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} 

	$sql = "INSERT INTO loginTest (userID, userPW, userName, joinDate, userModifyDate) VALUES ('$userID', '$userPW', '$userName', now(), now())";
	mysqli_query($conn, $sql);

	$_SESSION['is_login'] = true;
	$_SESSION['userName'] = $userName;
	$_SESSION['userID'] = $userID;

	mysqli_close($conn);
	$insertResult = "1";
	echo "{$insertResult}";

}	
?>
