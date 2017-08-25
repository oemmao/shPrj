<?php

session_start();

include "db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");
$userID = $_POST['id'];
$userPW = $_POST['pw'];

//echo "<script>alert(\"문자출력\");</script>"; >> 문자를 alert으로 출력할때
//echo "<script>alert($변수명);</script>"; >> 변수값을 alert으로 출력할때

if ($userID=="" || $userPW=="") {
	echo "<script>alert(\"ID 또는 PW를 입력해 주세요.\");
			document.location.href='loginForm.html';</script>";
} else {
	if(!$conn) { //DB 연결이 되지 않으면 에러발생
		die("Connection failed: " . mysqli_connect_error());
	} 

	$sql = "select userName from logintest where userID='$userID' and userPW='$userPW' and leaveCheck='F'";
	//loginForm.html에서 입력한 ID와 PW가 DB에 있는지 확인
	$result = mysqli_query($conn, $sql); //query 줌
	$count = mysqli_num_rows($result); 
	//DB에 값이 있는지 없는지 확인을 위해 사용 -> DB에 값이 일치하는 행의 갯수를 반환해주는 함수
	if($count == 1) {
		while ($row = mysqli_fetch_assoc($result)) { //selec한 userName을 가져오기 위한 함수
			//mysqli_fetch_assoc() 인출된 행을 연관 배열로 반환한다데, 잘 모르겠다 ㅋㅋ
		$_SESSION['is_login'] = true;
		$_SESSION['userName'] = $row['userName']; //$row['컬럼명']을 적여주면 해당 DB값을 출력할 수 있음
		$_SESSION['userID'] = $userID; //정보수정할때 ID값을 가져오기 위해 필요함
		header('Location: ./loginSession.php');
		//echo "<script>document.location.href='loginSession.php';</script>";
		}
	} else {
		echo "<script>alert(\"ID 또는 PW가 일치하지 않습니다.\");
				document.location.href='loginForm.html';</script>";
	}
	mysqli_close($conn);
}	
?>
