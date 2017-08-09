<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

$host = 'localhost';
$user = 'root';
$pw = '111111';
$dbName = 'myTest';
$num = $_GET['num'];
$writer = $_POST['writer'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$subject = $_POST['subject'];
$content = $_POST['content'];

if (empty($writer) || empty($email) || empty($passwd) || empty($subject) || empty($content)) {
	echo "<script>alert(\"빈칸을 모두 채워주세요.\");
			history.go(-1);</script>";
} else {

	$conn = mysqli_connect($host, $user, $pw, $dbName);

	if (!$conn) {
			die("Connection failed: " .mysqli_connect_error());
	}

	$sql = "select passwd from boardtest where num='$num'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	if ($passwd == $row['passwd']) {

		$updateSql = "update boardtest set writer='$writer', email='$email', passwd='$passwd', subject='$subject', content='$content', modifyDate=now() where num='$num'";
		mysqli_query($conn, $updateSql);
		echo "<script>alert(\"게시글이 수정되었습니다.\");
				document.location.href='readBoard.php?num=$num';</script>";
	} else {
		echo "<script>alert(\"비밀번호가 다릅니다.\");
				history.go(-1);</script>";
	}
mysqli_close($conn);
}
?>