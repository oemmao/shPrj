<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
}

include "db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");
$userID = $_POST['id'];
$userPW = $_POST['pw'];

if (empty($userPW)) {
	echo "";
	echo "<script>alert(\"비밀번호를 입력해 주세요.\");
			history.go(-1);</script>";
} else {

	if (!$conn) {
		die("Connection failed: " .mysqli_connect_error());
	}

	$sql = "update logintest set leaveDate=now(), leaveCheck='T' where userID='$userID' and userPW='$userPW'";

	//$sql = "update loginTest set userPW='$userPW', userName='$userName', userModifyDate=now() where userID='$userID'";

	$result = mysqli_query($conn, $sql);

	header('Location: ./loginForm.html');

	mysqli_close($conn);
}
?>
