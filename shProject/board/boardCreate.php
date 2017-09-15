<?
session_start();
if(!isset($_SESSION['isLogin'])) {
	header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$id = $_SESSION['id'];
$userID = $_SESSION['userID'];
//$userName = $_SESSION['userName'];
$subject = $_POST['inputSubject'];
$content = $_POST['inputContent'];


if (empty(subject)) {
	$result['result'] = false;
	$result['message'] = "제목을 입력해 주시기 바랍니다.";
} else if(empty(content)) {
	$result['result'] = false;
	$result['message'] = "내용을 입력해 주시기 바랍니다.";
} else {
	$sql = "insert into boardInfo (member_idx, subject, content, creatDate, modifyDate) values ('$id', '$subject', '$content', now(), now())";
	mysqli_query($con, $sql);
	
	$result['result'] = true;
	$result['message'] = "게시글이 등록 되었습니다.";
}
$output = json_encode($result);
echo $output;
mysqli_close($con);
?>