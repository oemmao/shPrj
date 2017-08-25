<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

include "../loginApp/db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");
//echo "삭제하러 오셨어요!";

$page = $_GET['page'];
$num = $_GET['num'];
$cmt = $_GET['cmt'];

if (!$conn) { 
	die("Connection failed: " .mysqli_connect_error());
}

$sqlCount = "update boardtest set cmtCount=cmtCount-1 where num='$num'";
	mysqli_query($conn, $sqlCount);

$sql = "delete from comment_test where comment_id='$cmt'";
mysqli_query($conn, $sql);

echo "<script>alert(\"댓글이 삭제 되었습니다.\");
		document.location.href='readBoard.php?page=$page&num=$num';</script>";
?>