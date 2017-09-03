<?
header("Content-type:text/html;charset=utf-8");
include '../db_Info.php';

$userID = $_POST['userID'];

if (empty($userID)) {
	$result["result"] = true;
	$result["message"] = "아이디를 입력해 주시기 바랍니다.";
} else { 

	$sql = "select userID from memberInfo where leaveCheck='F' and userID='$userID'";

	$result_1 = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result_1);
		
//	$result["count"] = $count;
//	$out = json_encode($result);
//	echo $out;

	if ($count) { //중복되는 아이디
		$result["result"] = true;
		$result["message"] = "이미 사용중인 아이디입니다. 다른 아이디를 입력해 주시기 바랍니다.";
	} else {  //사용할 수 있는 아이디
		$result["result"] = false;
		$result["message"] = "사용할 수 있는 아이디입니다.";
	}

}

$output = json_encode($result);
echo $output;

mysqli_Close($con);

?>