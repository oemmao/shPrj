<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

include "../loginApp/db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");

$writer = $_POST['writer'];
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$subject = $_POST['subject'];
$content = $_POST['content'];

if (empty($writer) || empty($email) || empty($passwd) || empty($subject) || empty($content)) {
	echo "빈칸을 모두 채워주세요.";
} else {
	

	if (!$conn) {
		die("Connection failed: " .mysqli_connect_error());
	}

	$sql = "insert into boardtest (writer, subject, email, passwd, content, creatDate, modifyDate) values ('$writer', '$subject', '$email', '$passwd', '$content', now(), now())";
	mysqli_query($conn, $sql);

	mysqli_close($conn);
	$result = "1";
	echo "{$result}";
}
?>
