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
	<form method="post" action="memberUpdate.php">
		<p>정보수정<br>
		아이디: <input type="text" name="id" value="<?php echo $_SESSION['userID'];?>" readonly><br>
		비밀번호: <input type="password" name="pw" ><br>
		이름: <input type="text" name="name" ><br>
		<input type="submit" value="수정" >
		<a href="./loginSession.php"><input type="button" value="이전으로" ></a>
		<!--
		<input type="button" value="회원가입" onclick="location.href='memberInsert.html' ">
		-->
	</form>
	
</body>
</html>