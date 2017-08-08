<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}
?>

<html>
<head>
<meta charset="utf-8" />
</head>
<body>
	<p>글쓰기 폼<br>
	<form method="post" action="#" >
		<table>
			<tr>
				<td colspan="2" >글목록</td>
			</tr>
			<tr>
				<td>이름</td>
				<td><input type="text" name="writer" ></td>
			</tr>
			<tr>
				<td>e-mail</td>
				<td><input type="text" name="email" ></td>
			</tr>
			<tr>
				<td>비밀번호</td>
				<td><input type="password" name="passwd" ></td>
			</tr>
			<tr>
				<td>제목</td>
				<td><input type="text" name="subject" ></td>
			</tr>
			<tr>
				<td>내용</td>
				<td><textarea name="content" ></textarea></td>
			</tr>
			<tr>
				<td colspan="2" >
					<input type="button" name="textSave" id="textSave" value="글 저장하기" >
					<input type="reset" value="다시작성" >
					<a href="boardIndex.php"><input type="button" name="" value="되돌아가기" ></a>
				</td>
			</tr>
		</table>
	</form>
<!-- 	글목록으로 가기 -->
<!-- 	이름 -->
<!-- 	제목 -->
<!-- 	이메일 -->
<!-- 	내용 -->
<!-- 	비밀번호 -->
<!-- 	글쓰기 버튼 / 다시작성 / 목록보기 -->
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="board.js"></script>
</html>