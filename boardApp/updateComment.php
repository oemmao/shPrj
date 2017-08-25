<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

include "../loginApp/db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");

$page = $_GET['page'];
$num = $_GET['num'];
$cmt = $_GET['cmt'];
$commentUpdate = $_POST['commentUpdate'];

//echo "num : $num, cmt : $cmt, commentUpdate : $commentUpdate";
//echo "<script>alert($num)</script>";
//echo "<script>alert($cmt)</script>";
//echo "<script>alert(\"$commentUpdate\")</script>";

if (!$conn) {
		die("Connection failed: " .mysqli_connect_error());
	}

$updateSql = "update comment_test set comment='$commentUpdate', modifyDate=now() where comment_id='$cmt'";
mysqli_query($conn, $updateSql);

echo "<script>alert(\"댓글이 수정되었습니다.\");
		document.location.href='readBoard.php?page=$page&num=$num';</script>";
		
mysqli_close($conn);
?>