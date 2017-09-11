<?
session_start();
if(!isset($_SESSION['isLogin'])){
header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$idx = $_GET['idx'];
$page = $_GET['page'];
$subject = $_POST['inputSubject'];
$content = $_POST['inputContent'];

if (empty($subject)) {
	$result["result"] = false;
	$result["message"] = "제목을 입력해 주시기 바랍니다.";
} else if (empty($content)) {
	$result["result"] = false;
	$result["message"] = "내용을 입력해 주시기 바랍니다.";
} else {
	$sql = "update boardInfo set subject='$subject', content='$content', modifyDate=now() where idx='$idx'";
	mysqli_query($con, $sql);

	$result["result"] = true;
	$result["message"] = "게시글 수정이 완료되었습니다.";
}
$output = json_encode($result);
echo "$output";
mysqli_close($con);
?>