<?
session_start();
if(!isset($_SESSION['isLogin'])) {
	header('Location: http://sflower121.phps.kr/shProject/index.php');
}
header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$idx = $_SESSION['id'];
$userID = $_POST['userID'];
$userPW = $_POST['userPW'];

if (empty($userPW)) {
	$result["result"] = false;
	$result["message"] = "비밀번호를 입력해 주시기 바랍니다.";
} else {
	//비밀번호 일치 여부 확인을 위해
	$sql = "select userPW from memberInfo where id='$idx'";	
	$check = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($check); 
	$row_userPW = $row['userPW'];

	if ($row_userPW == $userPW) {
		//회원정보 업데이트할 때, id값을 기준으로 찾는다.
	$sql = "update memberInfo set leaveDate=now(), leaveCheck='T'where id='$idx' and userID='$userID' and userPW='$userPW'";
	mysqli_query($con, $sql);
		$result["result"] = true;
		$result["message"] = "탈퇴가 완료되었습니다.";
	} else {
		$result["result"] = false;
		$result["message"] = "비밀번호가 다릅니다. 다시 입력해 주시기 바랍니다.";
	}
}
$output = json_encode($result);
echo $output;
mysqli_close($con);
?>
