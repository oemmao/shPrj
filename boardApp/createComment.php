<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

include "../loginApp/db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");

$num = $_GET['num'];
$page = $_GET['page'];
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
	//comment_test DB에 댓글 정보 추가
	$sql = "insert into comment_test (board_num, name, passwd, comment, commentDate, modifyDate) values ('$num', '$writer', '$passwd', '$comment', now(), now())";
	mysqli_query($conn, $sql);

	//새로 추가된 댓글의 comment_id 가져옴
	$sql_new = "select * from comment_test order by comment_id desc limit 1";
	$id_value = mysqli_query($conn, $sql_new);
	$row = mysqli_fetch_assoc($id_value);
	$id = $row['comment_id'];

	//cmt_reply에 comment_id값 넣어줌
	$sql = "update comment_test set cmt_reply= '$id' where comment_id='$id'";
	mysqli_query($conn, $sql);

	//boardtest DB의 cmtCount(댓글개수)에 값 업데이트 해줌
	$sql = "update boardtest set cmtCount=cmtCount+1 where num='$num'";
	mysqli_query($conn, $sql);

	mysqli_close($conn);

	echo "<script>alert(\"댓글이 등록되었습니다.\");
				document.location.href='readBoard.php?page=$page&num=$num';</script>";
}
?>