<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
}

$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbName = 'myTest';

$num = $_GET['num'];
$passwd = $_POST['passwd'];

$conn = mysqli_connect($host, $user, $pw, $dbName);

if (!$conn) { 
	die("Connection failed: " .mysqli_connect_error());
}

$sql = "select passwd from boardtest where num='$num'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($passwd == $row['passwd']) { //입력된 비밀번호와 DB 비밀번호 일치여부 확인
	$deleteSql = "delete from boardtest where num='$num'";
	mysqli_query($conn, $deleteSql);
	//삭제 성공
	echo "<script>alert(\"게시글이 삭제 되었습니다.\");
			document.location.href='boardIndex.php';</script>";

} else {
	//비밀번호 다름 또는 안적음
	echo "<script>alert(\"비밀번호가 다릅니다.\");
			history.go(-1);</script>";
}	

mysqli_query($conn);
?>