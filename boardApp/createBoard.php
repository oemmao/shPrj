<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: ./loginForm.html');
}
?>

<html>
<head>
	<meta charset="utf-8" />
</head>
<body>
<p>게시판 글쓰기<br>
<form>
	글목록으로 가기
	이름
	제목
	이메일
	내용
	비밀번호

	글쓰기 버튼 / 다시작성 / 목록보기
</form>
</body>
</html>