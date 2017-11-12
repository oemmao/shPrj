<?
session_start();
//한글깨짐을 방지하기 위해 캐릭터셋 설정
header("Content-Type:text/html;charset=utf-8");
//DB정보 가져옴
include '../db_Info.php';

$userID = $_POST['userID'];
$userPW = $_POST['userPW'];
$chk_remember = $_POST['chk_remember'];

if (empty($userID) || empty($userPW)) {
	$result["result"] = false;
	$result["message"] = "아이디 또는 비밀번호를 입력해 주시기 바랍니다.";
} else {
	//DB에서 유저 로그인 정보 가져옴
	$sql = "select id, userID, userName from memberInfo where userID='$userID' and userPW='$userPW' and leaveCheck='F'";
	//쿼리 날림
	$check = mysqli_query($con, $sql);
	//mysqli_num_rows() 함수 -> DB에 값이 일치하는 행의 갯수를 반환하는 함수 (DB의 값 유무 확인 시 사용하면 좋음)
	//$count는 0 또는 1을 반환함
	$count = mysqli_num_rows($check); 
	
	if($count) { //아이디, 비밀번호 있음 //로그인 성공
		//mysqli_fetch_assoc() 함수 -> 인출된 행을 연관 배열로 반환하는 함수 (DB 필드명이나 쿼리문에 사용된 alias로 배열을 참조할 수 있음)
		//alias란? 가명(별명)을 뜻함.(대체하여 사용할 수 있는 것) 예를 들면, DB 필드명이 길 경우, 짧게 만들어 사용할 수 있음.
		//alias Syntax -> SELECT column_name AS alias_name FROM table_name
		//ex) SELECT userID AS ID, userName AS NAME FROM memberInfo
		$row = mysqli_fetch_assoc($check);
		$_SESSION['isLogin'] = true;
		// $row['컬럼명']으로 작성하면 해당 컬럼의 DB 값을 출력할 수 있음.
		$_SESSION['userName'] = $row['userName']; 
		$_SESSION['userID'] = $row['userID'];
		$_SESSION['id'] = $row['id'];
//		$_SESSION['viewCheck'] = true;

//		$_COOKIE['cooki_id'] = $row['id'];
//		$_COOKIE['cooki_name'] = $row['userName'];
//		$_COOKIE['cooki_userID'] = $row['userID'];

		setcookie("cooki_user_idx", $row['id'], time()+(60*5), "/");
		setcookie("cooki_name", $row['userName'], time()+(60*5), "/");
		setcookie("cooki_userID", $row['userID'], time()+(60*5), "/");
		setcookie("cooki_userID_remember", $chk_remember, time()+(60*5), "/");

//		$userID_cookie = $row['u$_SESSION['userID'] = $row['userID'];serID'];
//		setcookie('$userID_cookie', 'LoginCookie', time()+60*60*1);
//		$myCookie = $_COOKIE['$userID_cookie'];
//		echo $myCookie;

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
