<?php
session_start();
if(!isset($_SESSION['is_login'])){
	header('Location: http://localhost/shPrj/loginApp/loginForm.html');
}

include "../loginApp/db_info.php";
//한글깨짐을 방지하기 위해 캐릭터셋을 설정해준당
header("Content-Type:text/html;charset=utf-8");

$num = $_GET['num'];

if (!$conn) {
	die("Connection failed: " .mysqli_connect_error());
}

$sql = "select * from boardtest where num='$num'";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
<meta charset="utf-8" />
</head>
<body>
	<p>글 수정<br>
	<form method="post" action="updateBoard.php?num=<?=$_GET['num']?>" >
		<table>
		<?php
			$row = mysqli_fetch_array($result);
		?>
			<tr>
				<td>이름</td>
				<td><input type="text" name="writer" value="<?=$row['writer']?>" readonly></td>
			</tr>
			<tr>
				<td>e-mail</td>
				<td><input type="text" name="email" value="<?=$row['email']?>"></td>
			</tr>
			<tr>
				<td>비밀번호</td>
				<td><input type="password" name="passwd" ></td>
			</tr>
			<tr>
				<td>제목</td>
				<td><input type="text" name="subject" value="<?=$row['subject']?>"></td>
			</tr>
			<tr>
				<td>내용</td>
				<td><textarea name="content" ><?=$row['content']?></textarea></td>
			</tr>
			<tr>
				<td colspan="2" >
					<input type="submit" value="수정하기" >
					<a href="readBoard.php?num=<?=$_GET['num']?>"><input type="button" name="" value="이전으로" ></a>
				</td>
			</tr>
		</table>
	</form>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="board.js"></script>
</html>