<?
session_start();
if(!sset($_SESSION['isLogin'])) {
	header('Location: http://sflower121.phps.kr/shProject/index.php');
}

include '../db_Info.php';
header("Content-Type:text/html;charset=utf-8");

$userID = $_POST['userID'];
$userPW = $_POST['userPW'];

if (empty($userPW)) {
	$result["result"] = false;
	$result["message"] = "비밀번호를 입력해 주시기 바랍니다.";
} else {
	$sql = "update memberInfo set leaveDate=now(), leaveCheck='T' where userID='$userID' and userPW='$userPW'";
	mysqli_query($con, $sql);
	
	$result["result"] = true;
	$result["message"] = "탈퇴가 완료되었습니다.";	
}
$output = json_encode($result);
echo $output;
mysqli_close($con);
?>
