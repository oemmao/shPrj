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
	<form method="post" action="memberUpdateForm.php">
	<p>로그인 완료<br>
	<p><?php echo $_SESSION['userName'];?>님, 반갑습니다.<br>
	<input type="submit" value="정보수정">
	<a href="./memberLogout.php"><input type="button" value="로그아웃" ></a><br>
	<!--
	<input type="button" value="로그아웃" onclick="location.href='memberLogout.php' ">
	-->
	<p>----------------------------<br>
	<p>게시판페이지 이동<br>
	<a href="../boardApp/boardIndex.php"><input type="button" value="게시판페이지 이동"></a>
	<p>----------------------------<br>
	<p>탈퇴메뉴<br>
	<a href="memberLeaveForm.php"><input type="button" value="탈퇴하기"></a>
	</form>
</body>
</html>