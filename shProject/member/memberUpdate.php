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
$userPWCheck = $_POST['userPWCheck'];
$userName = $_POST['userName'];
$userGender = $_POST['userGender'];

if (empty($userPW)) {
	$result["result"] = false;
	$result["message"] = "비밀번호를 입력해 주시기 바랍니다.";
} else if (empty($userPWCheck)) {
	$result["result"] = false;
	$result["message"] = "비밀번호재확인을 입력해 주시기 바랍니다.";
} else if ($userPW != $userPWCheck) {
	$result["result"] = false;
	$result["message"] = "비밀번호가 일치하지 않습니다. 다시 입력해 주시기 바랍니다.";
} else if (empty($userName)) {
	$result["result"] = false;
	$result["message"] = "이름을 입력해 주시기 바랍니다.";
} else if (!$userGender) {
	$result["result"] = false;
	$result["message"] = "성별을 선택해 주시기 바랍니다.";
} else {
	//회원정보 업데이트할 때, id값을 기준으로 찾는다.
	$sql = "update memberInfo set userPW='$userPW', userName='$userName', userGender='$userGender', userModifyDate=now() where id='$idx'";
	mysqli_query($con, $sql);
	//변경된 회원이름을 가져오기 위해 
	$sql_name = "select userName from memberInfo where id='$idx'";

	$update_name = mysqli_query($con, $sql_name);
	$row = mysqli_fetch_assoc($update_name);
	$_SESSION['userName'] = $row['userName'];

	$result["result"] = true;
//	$result["message"] = $sql_name;
	$result["message"] = "정보수정이 완료 되었습니다.";
}
$output = json_encode($result);
echo $output;
mysqli_close($con);
?>