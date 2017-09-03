<?
session_save_path('./session');
session_start();

header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$userID = $_POST['userID'];
$userPW = $_POST['userPW'];
$userPWCheck = $_POST['userPWCheck'];
$userName = $_POST['userName'];
$userGender = $_POST['userGender'];


if (empty($userID)) {
	$result["result"] = false;
	$result["message"] = "아이디를 입력해 주시기 바랍니다.11";
} else if (empty($userPW)) {
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

	$sql = "insert into memberInfo (userID, userPW, userName, userGender, joinDate, userModifyDate) values ('$userID', '$userPW', '$userName', '$userGender', now(), now())";

	mysqli_query($con, $sql);

	$_SESSION['isLogin'] = true;
	$_SESSION['userID'] = $userID;
	$_SESSION['userName'] = $userName;

	$result["result"] = true;
	$result["message"] = "회원가입이 완료 되었습니다.";
	
//	echo "<script>alert(\"회원가입이 완료 되었습니다.\");
//			document.location.href='memberLogion.php';</script>";
}
$output = json_encode($result);
echo $output;
mysqli_close($con);
?>
