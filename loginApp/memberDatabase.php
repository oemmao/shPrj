<?php

session_start();

include "db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");
$userID = $_POST['insertID'];
$userPW = $_POST['insertPW'];
$userName = $_POST['insertName'];
$checkID = $_POST['checkid'];

if ($userID=="" || $userPW=="" || $userName=="" ) {
	echo "빈칸을 모두 채워주세요";
} else {
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} 

	$sql = "INSERT INTO logintest (userID, userPW, userName, joinDate, userModifyDate) VALUES ('$userID', '$userPW', '$userName', now(), now())";
	mysqli_query($conn, $sql);

	$_SESSION['is_login'] = true;
	$_SESSION['userName'] = $userName;
	$_SESSION['userID'] = $userID;

	mysqli_close($conn);
	$insertResult = "1";
	echo "{$insertResult}";

}	
?>
