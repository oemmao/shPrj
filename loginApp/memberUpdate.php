<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
//    echo "<script>document.location.href='loginForm.html';</script>";
}

include "db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");
$userID = $_POST['id'];
$userPW = $_POST['pw'];
$userName = $_POST['name'];

if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$sql = "update logintest set userPW='$userPW', userName='$userName', userModifyDate=now() where userID='$userID'";
mysqli_query($conn, $sql);

//정보수정 후, 수정된 유저이름을 가져오기 위해 사용
$sql = "select userName from logintest where userID='$userID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION['userName'] = $row['userName'];

header('Location: ./loginSession.php');

mysqli_close($conn);

?>
