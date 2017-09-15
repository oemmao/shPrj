<?
session_start();
if(!isset($_SESSION['isLogin'])) {
	header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$id = $_SESSION['id'];
$page = $_GET['page'];
$idx = $_GET['idx'];
$userID = $_POST['comment_userID'];
$comment_text = $_POST['comment_text'];

if (empty($comment_text)) {
	$result['result'] = false;
	$result['message'] = "댓글 내용을 입력해 주시기 바랍니다..";	
} else {
	//DB에 댓글정보 추가
	$sql = "insert into commentInfo (member_idx, board_idx, comment, commentDate, modifyDate ) values ('$id', '$idx', '$comment_text', now(), now())";
	mysqli_query($con, $sql);

	//새로 추가된 DB의 idx 값 가져옴
	$sql_new = "select idx from commentInfo order by idx desc limit 1";
	$id_value = mysqli_query($con, $sql_new);
	$row = mysqli_fetch_assoc($id_value);
	$comment_idx = $row['idx'];

	//cmt_idx에 idx 값 넣어줌
	$sql_cmt = "update commentInfo set cmt_idx='$comment_idx' where idx='$comment_idx'";
	mysqli_query($con, $sql_cmt);

	$result['result'] = true;
	$result['message'] = "댓글이 등록 되었습니다.";	
}
$output = json_encode($result);
echo $output;
mysqli_close($con);
?>