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
<p>게시판만들기 메인<br>
<form>
	<a href="createBoardForm.php" ><input type="button" name="createBoard" value="글쓰기" ></a>
	<p>리스트 추가 예쩡<br>
	<a href="boardList.php" ><input type="button" name="boardList" value="리스트" ></a>
</form>
</body>
</html>