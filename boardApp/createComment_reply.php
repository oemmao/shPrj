<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

include "../loginApp/db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");

echo "대댓글 php임";

$num = $_GET['num'];
$page = $_GET['page'];
$cmt = $_GET['cmt'];
$c_commentWriter = $_POST['c_commentWriter'];
$c_commentPasswd = $_POST['c_commentPasswd'];
$c_comment = $_POST['c_comment'];

echo "<script>console.log(\"num= {$num}, cmt= {$cmt}, name={$c_commentWriter}\") </script>";
//echo "num= {$num}, cmt= {$cmt},";

if (empty($c_commentWriter) || empty($c_commentPasswd) || empty($c_comment)) {
//	echo "<script>alert(\"빈칸을 모두 채워주세요.\");
//			history.back(-1);</script>";
} else {
	$sql = "insert into comment_test (board_num, name, passwd, comment, commentDate, modityDate, cmt_reply) values ('$num', '$c_commentWriter', '$c_commentPasswd', '$c_comment', now(), now(), '$cmt')";
	mysqli_query($conn, $sql);
	
	$sql = "update boardtest set cmtCount=cmtCount+1 where num='$num'";
	mysqli_query($conn, $sql);

	mysqli_close($conn);

	echo "<script>alert(\"대댓글이 등록되었습니다.\");
				document.location.href='readBoard.php?page=$page&num=$num';</script>";
}

?>

