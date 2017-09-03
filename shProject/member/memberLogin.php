<?
session_start();

header("Content-Type:text/html;charset=utf-8");
include '../db_Info.php';

$userID = $_POST['userID'];
$userPW = $_POST['userPW'];

if (empty($userID) || empty($userPW)) {
	$result["result"] = false;
	$result["message"] = "아이디 또는 비밀번호를 입력해 주시기 바랍니다.";
} else {	
	$sql = "select userName from memberInfo where userID='$userID' and userPW='$userPW' and leaveCheck='F'";
	$check = mysqli_query($con, $sql);
	$count = mysqli_num_rows($check); 

	if($count) { //아이디, 비밀번호 있음 //로그인 성공
		$row = mysqli_fetch_assoc($check);
		$_SESSION['isLogin'] = true;
		$_SESSION['userName'] = $row['userName'];
		$result["result"] = true;
		$result["message"] = "로그인 되었습니다.";
	} else { //아이디 또는 비밀번호 일치하지 않음, 없음 //로그인 실패
		$result["result"] = false;
		$result["message"] = "로그인에 실패하였습니다. 아이디 또는 비밀번호를 확인해 주시기 바랍니다.";
	}
}
$output = json_encode($result);
echo $output;
mysqli_close($con);
?>
