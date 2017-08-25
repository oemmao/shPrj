<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
//    echo "<script>document.location.href='loginForm.html';</script>";
}
?>

<html>
<head>
	<meta charset="utf-8" />
</head>
<body>
	<form method="post" action="memberLeave.php">
	<p>회원탈퇴<br>한글써봅니당<br>
	아이디: <input type="text" name="id" value="<?php echo $_SESSION['userID'];?>" readonly><br>
	비밀번호: <input type="password" name="pw" ><br>
	<input type="submit" value="탈퇴완료" >
	</form>
</body>
</html>