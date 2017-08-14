<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

include "db_info.php";

$num = $_GET['num'];
$writer = $_POST['commentWriter'];
$passwd = $_POST['commentPasswd'];
$comment = $_POST['comment'];

//echo "num: {$num} writer: {$writer} passwd: {$passwd} comment: {$comment}";

if (empty($writer) || empty($passwd) || empty($comment)) {
	echo "<script>alert(\"빈칸을 모두 채워주세요.\"); 
				history.back(-1);</script>";
} else {

	if (!$conn) {
		die("Connection failed: " .mysqli_connect_error());
	}

	$sql = "insert into comment_test (board_num, name, passwd, comment, commentDate, modifyDate) values ('$num', '$writer', '$passwd', '$comment', now(), now())";

	mysqli_query($conn, $sql);

	$sql = "update boardtest set cmtCount=cmtCount+1 where num='$num'";
	mysqli_query($conn, $sql);

	mysqli_close($conn);

	echo "<script>alert(\"댓글이 등록되었습니다.\");
				document.location.href='readBoard.php?num=$num';</script>";
}
?>