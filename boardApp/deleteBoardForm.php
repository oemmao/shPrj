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
	<p>게시글 삭제<br>
	<form method="POST" action="deleteBoard.php?num=<?=$_GET['num']?>" >
	<table>
		<tr>
			<td>비밀번호를 입력해 주세요.</td>
		</tr>
		<tr>
			<td>비밀번호 : </td>
			<td><input type="password" name="passwd" ></td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="삭제" >
				<a href="readBoard.php?num=<?=$_GET['num']?>"><input type="button" value="이전으로"></a>
			</td>
		</tr>
	</table>
	</form>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="board.js"></script>
</html>