<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

include "db_info.php";
//echo "삭제하러 오셨어요!";

$num = $_GET['num'];
$cmt = $_GET['cmt'];

if (!$conn) { 
	die("Connection failed: " .mysqli_connect_error());
}

$sql = "delete from comment_test where comment_id='$cmt'";
mysqli_query($conn, $sql);

echo "<script>alert(\"댓글이 삭제 되었습니다.\");
		history.go(-1);</script>";
?>